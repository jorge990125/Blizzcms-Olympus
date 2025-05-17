<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('eventos_model');			
		
        if (!ini_get('date.timezone'))
		{
			date_default_timezone_set($this->config->item('timezone'));
		}
    }

    public function darkmoon()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_darmoon'),
			);

			$this->template->build('darkmoon', $data);
    }
	
	public function halloween()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_halloween'),
			);

			$this->template->build('halloween', $data);
	}
}