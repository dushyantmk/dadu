<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Javascript extends Frontend_Controller {
		
		public function __construct()
		{
			header('Content-type: text/javascript');
			parent::__construct();
			$this->config->load('canvas');
		}
		
		public function canvas()
		{
			// Load view
			$this->load->model('canvasjs_m');
			$this->load->view('canvasjs', $this->data);
    	}
	}
?>