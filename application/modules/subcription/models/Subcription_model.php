<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcription_model extends CI_Model {

    private $auth;
    private $web;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->load->database('auth', true); // Conexión a la BD del servidor
        $this->web = $this->load->database('default', true); // Conexión a la BD de la web
    }

    // Obtener puntos de donación del usuario
    public function getDonationPoints($user_id)
    {
        $query = $this->web->select('dp')->where('id', $user_id)->get('users');
        return $query->row() ? $query->row()->dp : 0;
    }

    // Verificar si el usuario ya tiene VIP
    public function isVip($user_id)
    {
        return $this->auth->where('id', $user_id)->count_all_results('account_vip') > 0;
    }

    // Realizar la compra de VIP
    public function buyVip($user_id, $vip_price)
   {
    // Iniciar transacción
    $this->web->trans_start();
    $this->auth->trans_start();

    // Verificar puntos de donación
    $donation_points = $this->getDonationPoints($user_id);
    if ($donation_points < $vip_price) {
        log_message('error', "El usuario $user_id no tiene suficientes puntos ($donation_points).");
        return false;
    }

    // Restar puntos de donación
    $this->web->set('dp', 'dp - ' . $vip_price, FALSE)
              ->where('id', $user_id)
              ->update('users');

    if ($this->web->affected_rows() <= 0) {
        log_message('error', "Error al restar los puntos de donación para el usuario $user_id.");
        return false;
    }

    // Calcular la fecha de expiración del VIP (30 días desde ahora)
    $expiration_timestamp = time() + (30 * 24 * 60 * 60); // 30 días en segundos

    // Insertar o actualizar la suscripción en `account_vip`
    $vip_data = [
        'id' => $user_id,
        'subscription_date' => $expiration_timestamp
    ];

    $this->auth->replace('account_vip', $vip_data); // Usamos REPLACE para actualizar si ya existe

    if ($this->auth->affected_rows() <= 0) {
        log_message('error', "Error al insertar VIP en la BD para el usuario $user_id.");
        return false;
    }

    // Confirmar la transacción si todo ha ido bien
    $this->web->trans_complete();
    $this->auth->trans_complete();

    if (!$this->web->trans_status() || !$this->auth->trans_status()) {
        log_message('error', "Error en la transacción de compra VIP para el usuario $user_id.");
        return false;
    }

    log_message('debug', "Compra VIP exitosa para el usuario $user_id. Expira en: " . date('Y-m-d H:i:s', $expiration_timestamp));
    return true;
    }
	
	public function getSubscriptionDate($user_id)
    {
    $query = $this->auth->select('subscription_date')->where('id', $user_id)->get('account_vip');
    return $query->row() ? $query->row()->subscription_date : null;
    }

    public function renewVip($user_id, $vip_price)
    {
    $current_time = time();
    $new_expiration_time = $current_time + (30 * 24 * 60 * 60); // 30 días en segundos

    // Conectar a la base de datos de auth para actualizar account_vip
    $auth_db = $this->load->database('auth', TRUE); // Conexión a la base auth
    
    // Verificar si el usuario ya tiene una suscripción VIP
    $query = $auth_db->get_where('account_vip', ['id' => $user_id]);

    if ($query->num_rows() > 0) {
        // Si el usuario ya tiene VIP, actualizar la fecha de expiración
        $auth_db->set('subscription_date', $new_expiration_time);
        $auth_db->where('id', $user_id);
        $auth_db->update('account_vip');
    } else {
        // Si no tiene VIP, insertar una nueva entrada
        $auth_db->insert('account_vip', [
            'id' => $user_id,
            'subscription_date' => $new_expiration_time
        ]);
    }

    // Conectar a la base de datos web para actualizar los puntos de donación
    $web_db = $this->load->database('default', TRUE); // Conexión a la base web

    // Resta los puntos de donación en la base de datos web
    $web_db->set('dp', 'dp - ' . $vip_price, FALSE);
    $web_db->where('id', $user_id);
    $web_db->update('users');

    return ($auth_db->affected_rows() > 0 && $web_db->affected_rows() > 0);
   }
   
   //premiun
   public function ispremiun($user_id)
    {
        return $this->auth->where('id', $user_id)->count_all_results('account_premiun') > 0;
    }

    // Realizar la compra de premiun
    public function buypremiun($user_id, $premiun_price)
   {
    // Iniciar transacción
    $this->web->trans_start();
    $this->auth->trans_start();

    // Verificar puntos de donación
    $donation_points = $this->getDonationPoints($user_id);
    if ($donation_points < $premiun_price) {
        log_message('error', "El usuario $user_id no tiene suficientes puntos ($donation_points).");
        return false;
    }

    // Restar puntos de donación
    $this->web->set('dp', 'dp - ' . $premiun_price, FALSE)
              ->where('id', $user_id)
              ->update('users');

    if ($this->web->affected_rows() <= 0) {
        log_message('error', "Error al restar los puntos de donación para el usuario $user_id.");
        return false;
    }

    // Calcular la fecha de expiración del premiun (30 días desde ahora)
    $expiration_timestamp = time() + (30 * 24 * 60 * 60); // 30 días en segundos

    // Insertar o actualizar la suscripción en `account_premiun`
    $premiun_data = [
        'id' => $user_id,
        'subscription_date' => $expiration_timestamp,
		'active' => 1
    ];

    $this->auth->replace('account_premiun', $premiun_data); // Usamos REPLACE para actualizar si ya existe

    if ($this->auth->affected_rows() <= 0) {
        log_message('error', "Error al insertar premiun en la BD para el usuario $user_id.");
        return false;
    }

    // Confirmar la transacción si todo ha ido bien
    $this->web->trans_complete();
    $this->auth->trans_complete();

    if (!$this->web->trans_status() || !$this->auth->trans_status()) {
        log_message('error', "Error en la transacción de compra premiun para el usuario $user_id.");
        return false;
    }

    log_message('debug', "Compra premiun exitosa para el usuario $user_id. Expira en: " . date('Y-m-d H:i:s', $expiration_timestamp));
    return true;
    }
	
	public function getPremiunDate($user_id)
    {
    $query = $this->auth->select('subscription_date')->where('id', $user_id)->get('account_premiun');
    return $query->row() ? $query->row()->subscription_date : null;
    }

    public function renewpremiun($user_id, $premiun_price)
    {
    $current_time = time();
    $new_expiration_time = $current_time + (30 * 24 * 60 * 60); // 30 días en segundos

    // Conectar a la base de datos de auth para actualizar account_premiun
    $auth_db = $this->load->database('auth', TRUE); // Conexión a la base auth
    
    // Verificar si el usuario ya tiene una suscripción premiun
    $query = $auth_db->get_where('account_premiun', ['id' => $user_id]);

    if ($query->num_rows() > 0) {
        // Si el usuario ya tiene premiun, actualizar la fecha de expiración
        $auth_db->set('subscription_date', $new_expiration_time);
        $auth_db->where('id', $user_id);
        $auth_db->update('account_premiun');
		$auth_db->update('active');
    } else {
        // Si no tiene premiun, insertar una nueva entrada
        $auth_db->insert('account_premiun', [
            'id' => $user_id,
            'subscription_date' => $new_expiration_time,
			'active' => 1
        ]);
    }

    // Conectar a la base de datos web para actualizar los puntos de donación
    $web_db = $this->load->database('default', TRUE); // Conexión a la base web

    // Resta los puntos de donación en la base de datos web
    $web_db->set('dp', 'dp - ' . $premiun_price, FALSE);
    $web_db->where('id', $user_id);
    $web_db->update('users');

    return ($auth_db->affected_rows() > 0 && $web_db->affected_rows() > 0);
   }
}
