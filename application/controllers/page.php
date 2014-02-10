<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Page extends Frontend_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('page_m');
		}
		
		public function index(){
			
    	}
	}
?>