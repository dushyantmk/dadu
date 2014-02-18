<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Page extends Frontend_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('page_m');
			$this->load->helper('cms');
		}
		
		public function index()
		{
			$this->load->view('_main_layout', $this->data);
    	}
	}
	
	