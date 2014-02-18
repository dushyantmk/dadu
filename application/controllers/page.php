<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Page extends Frontend_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('page_m');
		}
		
		public function index()
		{
			// Fetch all the page data
			$this->data['page'] = $this->page_m->get_by(array('slug' => (string)$this->uri->segment(1)), TRUE);
			count($this->data['page']) || show_404(current_url());
			
			// Fetch the data
			
			// Load the view
			$this->load->view('_main_layout', $this->data);
			
    	}
	}
	
	