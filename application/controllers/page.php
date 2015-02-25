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
			$method = '_' .$this->data['page']->template;
			$this->$method();
			
			// Load the view
			$this->data['subview'] = $this->data['page']->template;
			$this->load->view('_main_layout', $this->data);			
    	}
		
		private function _page()
		{
			dump('Welcome to the generic template');
		}
		private function _homepage()
		{
			$this->load->model('product_m');
			$this->db->limit(3);
			$this->data['products'] = $this->product_m->get();
			
			$this->load->model('category_m');
			$this->db->limit(3);
			$this->data['categories'] = $this->category_m->get();
			
		}
		private function _products()
		{
			dump('Welcome to the products template');
		}
		private function _categories()
		{
			dump('Welcome to the categories template');
		}
	}
	
	