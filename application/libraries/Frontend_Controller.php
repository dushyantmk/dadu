<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Frontend_Controller extends MY_Controller 
	{
		function __construct()
		{
			parent::__construct();
			
			//Load everything
			$this->load->model('page_m');
			
			//Fetch navigation
			$this->data['menu'] = $this->page_m->get_nested();
		}
	}

?>