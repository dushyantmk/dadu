<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Admin_Controller extends MY_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->data['meta_title'] = 'Dadu CMS Framework';
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('user_m');
			
			// Login check
			// Login check
			$exception_uris = array(
				'admin/user/login', 
				'admin/user/logout'
			);
			if (in_array(uri_string(), $exception_uris) == FALSE) {
				if ($this->user_m->loggedin() == FALSE) {
					redirect('admin/user/login');
				}
			}
		}
	}
?>