<?php
	class Canvasprimary extends Frontend_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->config->load('canvas');
			$this->load->helper('canvas');
		}
		
		public function index()
		{
			// Load view
			$this->load->model('canvasprimary_m');
			$this->load->view('canvasprimary', $this->data);
    	}
	}
?>