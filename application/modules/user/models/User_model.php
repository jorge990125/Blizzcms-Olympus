<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	/**
	 * User_model constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth = $this->load->database('auth', true);
	}
	
	/**
	 * @param mixed $email
	 *
	 * @return [type]
	 */
	public function getExistEmail($email)
	{
		return $this->auth->select('email')->where('email', $email)->get('account')->num_rows();
	}

	/**
	 * @return [type]
	 */
	public function getAllAvatars()
	{
		return $this->db->select('*')->order_by('id ASC')->get('avatars');
	}

	/**
	 * @param mixed $avatar
	 *
	 * @return [type]
	 */
	public function changeAvatar($avatar)
	{
		$this->db->set('profile', $avatar)->where('id', $this->session->userdata('wow_sess_id'))->update('users');
		return true;
	}

	/**
	 * @param mixed $id
	 *
	 * @return [type]
	 */
	public function getDateMember($id)
	{
		$qq = $this->db->select('joindate')->where('id', $id)->get('users');

		if ($qq->num_rows()) {
			return $qq->row('joindate');
		} else {
			return 'Unknow';
		}
	}

	/**
	 * @param mixed $id
	 *
	 * @return [type]
	 */
	public function getExpansion($id)
	{
		$qq = $this->db->select('expansion')->where('id', $id)->get('users');

		if ($qq->num_rows()) {
			return $qq->row('expansion');
		} else {
			return 'Unknow';
		}
	}

	/**
	 * @param mixed $id
	 *
	 * @return [type]
	 */
	public function getLastIp($id)
	{
		return $this->auth->select('last_ip')->where('id', $id)->get('account')->row('last_ip');
	}

	/**
	 * Check if user exists
	 *
	 * @param int $id
	 * @return boolean
	 */
	public function find_user($id)
	{
		$query = $this->db->where('id', $id)->get('users')->num_rows();

		return ($query == 1);
	}


	/**
	 * @param mixed $username
	 * @param mixed $password
	 *
	 * @return [type]
	 */
	public function authentication($username, $password)
	{
		$accgame =  $this->auth->where('username', $username)->or_where('email', $username)->get('account')->row();
		$emulator = $this->config->item('emulator');

		if (empty($accgame)) {
			return false;
		}

		switch ($emulator) {
			case 'srp6':
				if ($this->auth->field_exists('verifier', 'account')):
					$validate = ($accgame->verifier === $this->wowauth->game_hash($accgame->username, $password, 'srp6', $accgame->salt));
				else:
					$validate = ($accgame->v === $this->wowauth->game_hash($accgame->username, $password, 'srp6', $accgame->s));
				endif;
				break;
			case 'hex':
				$validate = (strtoupper($accgame->v) === $this->wowauth->game_hash($accgame->username, $password, 'hex', $accgame->s));
				break;
			case 'old-trinity':
				$validate = hash_equals(strtoupper($accgame->sha_pass_hash), $this->wowauth->game_hash($accgame->username, $password));
				break;
		}

		if (!isset($validate) || !$validate) {
			return false;
		}

		// if account on website don't exist sync values from game account
		if (!$this->find_user($accgame->id)) {
			$this->db->insert('users', [
				'id'        => $accgame->id,
				'username'  => $accgame->username,
				'email'     => $accgame->email,
				'joindate' => strtotime($accgame->joindate)
			]);
		}

		$this->wowauth->arraySession($accgame->id);

		return true;
	}

	/**
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @param mixed $emulator
	 *
	 * @return [type]
	 */
	public function insertRegister($username, $email, $password, $emulator)
	{
		$date = $this->wowgeneral->getTimestamp();
		$expansion = $this->wowgeneral->getRealExpansionDB();
		$emulator = $this->config->item('emulator');

		if ($emulator == "srp6") {
			$salt = random_bytes(32);

			if ($this->auth->field_exists('session_key', 'account')):
				$data = [
					'username'  => $username,
					'salt'      => $salt,
					'verifier' => $this->wowauth->game_hash($username, $password, 'srp6', $salt),
					'email'     => $email,
					'expansion' => $expansion,
					'session_key' => null
				];
			else:
				$data = [
					'username'  => $username,
					'salt'      => $salt,
					'verifier' => $this->wowauth->game_hash($username, $password, 'srp6', $salt),
					'email'     => $email,
					'expansion' => $expansion,
					'session_key_auth' => null,
					'session_key_bnet' => null
				];
			endif;

			$this->auth->insert('account', $data);

		} elseif ($emulator == "hex") {
			$salt = strtoupper(bin2hex(random_bytes(32)));

			$data = [
				'username'  => $username,
				'v'          => $this->wowauth->game_hash($username, $password, 'hex', $salt),
				's'          => $salt,
				'email'     => $email,
				'expansion' => $expansion,
				'last_ip' => '127.0.0.1'
			];

			$this->auth->insert('account', $data);
		} elseif ($emulator == "old-trinity") {
			$data = [
				'username'  => $username,
				'sha_pass_hash' => $this->wowauth->game_hash($username, $password),
				'email'     => $email,
				'expansion' => $expansion,
				'sessionkey'    => '',
			];

			$this->auth->insert('account', $data);
		}

		$id = $this->wowauth->getIDAccount($username);

		if ($this->config->item('bnet_enabled')) {
			$data1 = [
				'id' => $id,
				'email' => $email,
				'sha_pass_hash' => $this->wowauth->game_hash($email, $password, 'bnet')
			];

			$this->auth->insert('battlenet_accounts', $data1);

			$this->auth->set('battlenet_account', $id)->where('id', $id)->update('account');
			$this->auth->set('battlenet_index', '1')->where('id', $id)->update('account');
		}

		$website = [
			'id' => $id,
			'username' => $username,
			'email' => $email,
			'joindate' => $date,
			'dp' => 0,
			'vp' => 0
		];

		$this->db->insert('users', $website);

		return true;
	}

	/**
	 * @param mixed $username
	 *
	 * @return [type]
	 */
	public function checkuserid($username)
	{
		return $this->auth->select('id')->where('username', $username)->get('account')->row('id');
	}

	/**
	 * @param mixed $email
	 *
	 * @return [type]
	 */
	public function checkemailid($email)
	{
		return $this->auth->select('id')->where('email', $email)->get('account')->row('id');
	}

	/**
	 * @param mixed $username
	 * @param mixed $email
	 *
	 * @return [type]
	 */
	public function sendpassword($username, $email)
	{
		$ucheck = $this->checkuserid($username);
		$echeck = $this->checkemailid($email);

		if ($ucheck == $echeck) {
			$allowed_chars = "0123456789abcdefghijklmnopqrstuvwxyz";
			$password_generated = "";
			$password_generated = substr(str_shuffle($allowed_chars), 0, 14);
			$newpass = $password_generated;
			$salt = strtoupper(bin2hex(random_bytes(32)));
			$password_hashed = $this->wowauth->game_hash($username, $newpass, 'hex', $salt);
			$accupdate = [
				'v' => $password_hashed,
				's' => $salt,
				'last_ip' => '127.0.0.1',
			];
			$this->auth->where('id', $ucheck)->update('account', $accupdate);

			$template = 'mail-forgot-password.php';
			$data = [
				'username' => $username,
				'password' => $password_generated,
			];

			return $this->wowgeneral->smtpSendEmail($email, $this->lang->line('email_password_recovery'), $template, $data);
		} else {
			return 'sendErr';
		}
	}

	/**
	 * @return [type]
	 */
	public function sendActivationCode($username, $email, $password)
	{
		$allowed_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$code_generated = "";
		$code_generated = $this->generate_string($allowed_chars, 32);
		$code = $code_generated;

		$date = $this->wowgeneral->getTimestamp();
		$emulator = $this->config->item('emulator');
		$password_hashed = '';
		$salt = '';

		if ($emulator == "srp6") {
			$salt = random_bytes(32);
			$password_hashed = $this->wowauth->game_hash($username, $password, 'srp6', $salt);
		} elseif ($emulator == "hex") {
			$salt = strtoupper(bin2hex(random_bytes(32)));
			$password_hashed = $this->wowauth->game_hash($username, $password, 'hex', $salt);
		} elseif ($emulator == "old-trinity") {
			$password_hashed = $this->wowauth->game_hash($username, $password);
		}

		$pending = [
			'username' => $username,
			'email' => $email,
			'password' => $password_hashed,
			'password_bnet' => $salt,
			'expansion' => $this->config->item('expansion'),
			'joindate' => $date,
			'key' => $code
		];

		$this->db->insert('pending_users', $pending);
		$template = 'mail-activation.php';

		$data = array(
			'code' => $code
		);

		return $this->wowgeneral->smtpSendEmail($email, $this->lang->line('email_account_activation'), $template, $data);
	}

	/**
	 * @param mixed $account
	 *
	 * @return [type]
	 */
	public function getIDPendingUsername($account)
	{
		return $this->db->select('id')->where('username', $account)->get('pending_users')->num_rows();
	}

	/**
	 * @param mixed $email
	 *
	 * @return [type]
	 */
	public function getIDPendingEmail($email)
	{
		return $this->db->select('id')->where('email', $email)->get('pending_users')->num_rows();
	}

	/**
	 * @param mixed $key
	 *
	 * @return [type]
	 */
	public function checkPendingUser($key)
	{
		return $this->db->select('id')->where('key', $key)->get('pending_users')->num_rows();
	}

	/**
	 * @param mixed $key
	 *
	 * @return [type]
	 */
	public function getTempUser($key)
	{
		return $this->db->select('*')->where('key', $key)->get('pending_users')->row_array();
	}

	/**
	 * @param mixed $key
	 *
	 * @return [type]
	 */
	public function removeTempUser($key)
	{
		return $this->db->where('key', $key)->delete('pending_users');
	}

	/**
	 * @param mixed $key
	 *
	 * @return [type]
	 */
	public function activateAccount($key)
	{
		$check = $this->checkPendingUser($key);
		$temp = $this->getTempUser($key);

		if ($check == "1") {
				$data = [
					'username' => $temp['username'],
					'verifier' => $temp['password'],
					'salt' => $temp['password_bnet'],
					'email' => $temp['email'],
					'expansion' => $temp['expansion'],
					'last_ip' => '127.0.0.1' 
				];

				$this->auth->insert('account', $data);

			$id = $this->wowauth->getIDAccount($temp['username']);

			$data3 = [
				'id' => $id,
				'username' => $temp['username'],
				'email' => $temp['email'],
				'joindate' => $temp['joindate']
			];

			$this->db->insert('users', $data3);

			$this->removeTempUser($key);

			$this->session->set_flashdata('account_activation', 'true');
			redirect(base_url('login'));
		} else {
			$this->session->set_flashdata('account_activation', 'false');
		}
		redirect(base_url('login'));
	}


	 /**
	  * @param mixed $username
	  * @param mixed $newusername
	  * @param mixed $password
	  * 
	  * @return [type]
	  */
	 public function changeUsername($username, $newusername, $password)
	 {
		$accgame =  $this->auth->where('username', $username)->or_where('email', $username)->get('account')->row();
		$id = $this->session->userdata('wow_sess_id');
		$emulator = $this->config->item('emulator');

		if (empty($accgame)) {
			return false;
		}

		switch ($emulator) {
			case 'srp6':
				$validate = ($accgame->verifier === $this->wowauth->game_hash($accgame->username, $password, 'srp6', $accgame->salt));
				break;
			case 'hex':
				$validate = (strtoupper($accgame->v) === $this->wowauth->game_hash($accgame->username, $password, 'hex', $accgame->s));
				break;
			case 'old_trinity':
				$validate = hash_equals(strtoupper($accgame->sha_pass_hash), $this->wowauth->game_hash($accgame->username, $password));
				break;
		}

		if (!isset($validate) || !$validate) {
			return false;
		}

		$query = $this->db->set('username', $newusername)->where('id', $id)->or_where('username', $username)->update('users');

		if (empty($query))
			return false;
		else        
			$this->auth->set('username', $newusername)->where('id', $id)->or_where('username', $username)->update('account');
			if ($this->generateHash($emulator, $newusername, $password))
				return true;
			else
				return false;
	 }

	 /**
	  * @param mixed $oldpass
	  * @param mixed $newpass
	  * @param mixed $renewpass
	  * 
	  * @return [type]
	  */
	 public function changePassword($newpass)
	 {
		$accgame = $this->auth->where('id', $this->session->userdata('wow_sess_id'))->get('account')->row();
		$emulator = $this->config->item('emulator');

		if (empty($accgame)) {
			return false;
		}

		if ($this->generateHash($emulator, $accgame->username, $newpass)) {
				 return true;
		} else {
				 return false;
		}
	 }

	 /**
	  * @param mixed $email
	  * @param mixed $newemail
	  * @param mixed $password
	  * 
	  * @return [type]
	  */
	 public function changeEmail($email, $newemail, $password)
	 {
		$accgame =  $this->auth->where('email', $email)->get('account')->row();
		$id = $this->session->userdata('wow_sess_id');
		$emulator = $this->config->item('emulator');

		if (empty($accgame)) {
			return false;
		}

		switch ($emulator) {
			case 'srp6':
				$validate = ($accgame->verifier === $this->wowauth->game_hash($accgame->username, $password, 'srp6', $accgame->salt));
				break;
			case 'hex':
				$validate = (strtoupper($accgame->v) === $this->wowauth->game_hash($accgame->username, $password, 'hex', $accgame->s));
				break;
			case 'old_trinity':
				$validate = hash_equals(strtoupper($accgame->sha_pass_hash), $this->wowauth->game_hash($accgame->username, $password));
				break;
		}

		if (!isset($validate) || !$validate) {
			return false;
		}

		$query = $this->db->set('email', $newemail)->where('id', $id)->or_where('email', $email)->update('users');

		if (empty($query))
			return false;
		else        
			$this->auth->set('email', $newemail)->where('id', $id)->or_where('email', $email)->update('account');
			if ($this->generateHash($emulator, $accgame->username, $password))
				return true;
			else
				return false;
	 }

	 /**
	  * @param mixed $emulator
	  * @param mixed $username
	  * @param mixed $password
	  * 
	  * @return [type]
	  */
	 public function generateHash($emulator, $username, $password)
	 {
		if ($emulator == "srp6") {
			$salt = random_bytes(32);

			$data = [
				'salt'      => $salt,
				'verifier' => $this->wowauth->game_hash($username, $password, 'srp6', $salt)
			];

			$this->auth->where('username', $username)->update('account', $data);

		} elseif ($emulator == "hex") {
			$salt = strtoupper(bin2hex(random_bytes(32)));

			$data = [
				'v'          => $this->wowauth->game_hash($username, $password, 'hex', $salt),
				's'          => $salt,
			];

			$this->auth->where('username', $username)->update('account', $data);
		} elseif ($emulator == "old-trinity") {
			$data = [
				'sha_pass_hash' => $this->wowauth->game_hash($username, $password),
			];

			$this->auth->where('username', $username)->update('account', $data);
		}
		
		return true;
	}

	/**
	 * @param mixed $input
	 * @param mixed $strength = 16
	 * 
	 * @return [type]
	 */
	protected function generate_string($input, $strength = 16)
	{
		$input_length = strlen($input);
		$random_string = '';
		for ($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}

		return $random_string;
	}
}
