<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends MX_Controller {

    public function __construct()
    {
        parent::__construct();	
        $this->load->model('noticias_model');	
        $this->load->model('news/news_model');
		
        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->wowgeneral->getMaintenance())
            redirect(base_url('maintenance'),'refresh');
    }

    public function index()
    {
        $data = array(
            'pagetitle' => $this->lang->line('tab_news'),
            'NewsList' => $this->news_model->getNewsList()->result(),
			);

			$this->template->build('index', $data);
    }
}