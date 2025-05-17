<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('soporte_model');			
		
        if (!ini_get('date.timezone'))
		{
			date_default_timezone_set($this->config->item('timezone'));
		}
    }

    public function rates()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_xp'),
			);

			$this->template->build('rates', $data);
    }
	
	public function vip()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_vip'),
			);

			$this->template->build('vip', $data);
	}
	
	public function tienda()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_tienda'),
			);

			$this->template->build('tienda', $data);
	}
	
	public function cross()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_cross'),
			);

			$this->template->build('cross', $data);
	}
	
	public function informacion()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_info'),
			);

			$this->template->build('informacion', $data);
	}
	
	public function verificacionstream()
	{
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}
		
		$data = array(
            'pagetitle' => $this->lang->line('tab_info'),
			);

			$this->template->build('verificacionstream', $data);
	}	
}