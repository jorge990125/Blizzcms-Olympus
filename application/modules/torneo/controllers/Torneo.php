<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torneo extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('torneo_model');			
		
        if (!ini_get('date.timezone'))
		{
			date_default_timezone_set($this->config->item('timezone'));
		}
    }

    public function arena1vs1()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_reino'),
			);

			$this->template->build('arena1vs1', $data);
    }
	
	public function arena2vs2()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_reino'),
			);

			$this->template->build('arena1vs1', $data);
    }
	
	public function pve()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_reino'),
			);

			$this->template->build('pve', $data);
    }
}