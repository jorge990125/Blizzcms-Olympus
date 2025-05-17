<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruit_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->load->database('auth', true);
    }

    public function getAccountID($id)
    {
        return $this->auth->select('id')->where('id', $id)->get('account')->row('id');
    }

    public function getRecruiterID($id)
    {
        return $this->auth->select('recruiter')->where('id', $id)->get('account')->row('recruiter');
    }

    public function addRecruiter($recruitId)
    {
        $existingAccount = $this->auth->select('id')->where('id', $recruitId)->get('account')->row('id');
        $recruiter = $this->auth->select('recruiter')->where('id', $this->session->userdata('wow_sess_id'))->get('account')->row('recruiter');

        if (!$existingAccount)
        {
            return 'accountIdNotFound';
        }

        if ($recruiter > 0)
        {
            return 'alreadyRecruited';
        }
        /*recompenzas en vp al reclutar a un jugador*/
        $this->auth->set('recruiter', $recruitId)->where('id', $this->session->userdata('wow_sess_id'))->update('account');
        $vpNow = $this->db->select('vp')->where('id', $this->session->userdata('wow_sess_id'))->get('users')->row('vp');
        $vpReward = 0; /*cantidad de vp que recivira el jugador cuando reclute*/
        $this->db->set('vp', $vpNow + $vpReward)->where('id', $this->session->userdata('wow_sess_id'))->update('users');
        return 'accountIDFound';
    }
}