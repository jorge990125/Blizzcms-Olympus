<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruit extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('recruit_model');

        if (!ini_get('date.timezone')) {
            date_default_timezone_set($this->config->item('timezone'));
        }

        if (!$this->wowgeneral->getMaintenance()) {
            redirect(base_url('maintenance'), 'refresh');
        }

        if (!$this->wowauth->isLogged()) {
            redirect(base_url('login'), 'refresh');
        }
    }

    public function index()
    {
        $id = $this->recruit_model->getAccountID($this->session->userdata('wow_sess_id'));
        $recruiter = $this->recruit_model->getRecruiterID($this->session->userdata('wow_sess_id'));

        $data = array(
            'pagetitle' => $this->lang->line('tab_recruit_friend'),
            'lang' => $this->lang->lang(),
            'recruiter' => $recruiter,
            'id' => $id
        );

        $this->template->build('index', $data);
    }

    public function add()
    {
        $recruit = $this->input->post('recruit');
        echo $this->recruit_model->addRecruiter($recruit);
    }
}