<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reino extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('reino_model');	
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

        // Obtener conexi�n al reino        
		$realmId = 1;
        $realmData = $this->realm_model->getRealmConnectionData($realmId);

        // Datos para pasar a la vista
        $data = array(
            'pagetitle'  => $this->lang->line('tab_reino'),
            'realmData'  => $realmData, // Pasamos los datos de conexi�n
        );

        $this->template->build('index', $data);
    }
}