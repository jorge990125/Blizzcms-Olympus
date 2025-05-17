<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bountyhunter extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('bountyhunter_model');
        $this->load->model('realm_model');
		
        if (!ini_get('date.timezone'))
		{
			date_default_timezone_set($this->config->item('timezone'));
		}
    }
	
	public function index()
    {
        if (!$this->wowgeneral->getMaintenance()) {
            redirect(base_url('maintenance'), 'refresh');
        }
		
        // Obtener conexión al reino
		$realmId = 1;
        $realmData = $this->realm_model->getRealmConnectionData($realmId);

        // Datos para pasar a la vista
        $data = array(
            'pagetitle'  => $this->lang->line('tab_bounty'),
            'realmData'  => $realmData, // Pasamos los datos de conexión
        );

        $this->template->build('index', $data);
    }
}