<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class MY_Controller extends CI_Controller {
		
		public $data = array();
		function __construct(){
			parent::__construct();
			$this->data['errors'] = array();
			$this->data['site_name'] = config_item('site_name');
		}
	}
?>