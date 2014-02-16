<?php
class Canvas extends Admin_Controller
{
	public function __construct ()
	{
		parent::__construct();
		$this->config->load('canvas');
		$this->load->helper('canvas');
	}

	public function index ()
	{
		$config = $this->config->item('canvas');
		
		// Load view
		$this->data['subview'] = 'admin/canvas/index';
		$this->load->view('admin/_layout_main', $this->data); 
	}
	
	/**************************************************
	/* do_upload will upload the custom brand logo
	/* to the folder (root)/images/canvas/logos
	/* This logo will be printed on the custom canvas
	**************************************************/
	
        public function do_upload()
		{
			/*******************************************************
			/* Scan and delete any existing logos in the directoty
			/* This bit of code is important because it will save
			/* hosting space and keep only one instance (latest) 
			/* of the logo in the directory 
  			******************************************************/
			
			$dir = FCPATH.'images/canvas/logos';
			foreach (scandir($dir) as $item) 
			{
				if ($item == '.' || $item == '..') continue;
				unlink($dir.DIRECTORY_SEPARATOR.$item);
			}
			
			/* Now to upload functionality */
			
			$config['upload_path'] = './images/canvas/logos/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '200';
			$config['max_width']  = '300';
			$config['max_height']  = '150';
	
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$data = array('error' => $this->upload->display_errors());
				$this->load->view('admin/canvas/index', $data);
			}
			else
			{
				$data = $this->upload->data();
				
				$config = $this->config->item('canvas');
				$config['logo_url'] = 'images/canvas/logos/'. $data['file_name'];
				
				$this->config->set_item('canvas', $config);
				Canvas_helper::save_config_file();
				redirect('admin/canvas/');
			}
		}

	/**************************************************
	/* template_upload will upload the product templates 
	/* to the folder (root)/images/canvas/products
	/* These templates will provide various colour 
	/* options of the product to the user on request
	**************************************************/

        public function template_upload()
		{
			$config['upload_path'] = './images/canvas/products/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '300';
			$config['max_width']  = '500';
			$config['max_height']  = '400';
	
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$data = array('error' => $this->upload->display_errors());
				$this->load->view('admin/canvas/index', $data);
			}
			else
			{
				$data = $this->upload->data();
				
				$config = $this->config->item('canvas');
				$config['template_images'] = 'images/canvas/products/'. $data['file_name'];
				
				$this->config->set_item('canvas', $config);
				Canvas_helper::save_config_file();
				redirect('admin/canvas/');
			}
		}
	
	/**************************************************
	/* save function will store all the parameters
	/* from the custom canvas form in admin.
	**************************************************/

		public function save()
		{
			// Set up the form
			//$rules = $this->canvas_m->rules;
			//$this->form_validation->set_rules($rules);

			// Process the form
			//if ($this->form_validation->run() == TRUE) {
			
			$config = $this->array_from_post(array(
				'dimensions_width', 
				'dimensions_height', 
				'logo_x', 
				'logo_y',
				'product_x',
				'product_y',
				'text_box_0_x',
				'text_box_0_y',
				'text_box_1_x',
				'text_box_1_y',
				'text_colour',
				'text_font',
				'text_weight',
				'text_size',
			));
			 
			$config['logo_url'] = $this->config->item('logo_url', 'canvas');
			
			$this->config->set_item('canvas', $config);
			
			
			Canvas_helper::save_config_file();
			redirect('admin/canvas');
		//}
		
			// Load the view
			$this->data['subview'] = 'admin/canvas/index';
			$this->load->view('admin/_layout_main', $this->data);
		}

		private function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) 
		{
			$data[$field] = $this->input->post($field);
		}
		var_dump($data);
		return $data;
	}
	
	/************************************
	/* Delete the product templates 
	/* uploaded from the template_upload 
	/* function
	************************************/
	public function delete()
	{
		unlink(FCPATH .'images/canvas/products/'. $this->uri->segment(4));
		redirect('admin/canvas/index');		
	}
}