<?php
class Canvas extends Admin_Controller
{
	public function __construct ()
	{
		parent::__construct();
		$this->load->helper('canvas_config');
	}

	public function index ()
	{
		echo '<pre>';
		$config = $this->config->item('canvas');
		
		$config['dimensions_width'] = 1337;
		
		$this->config->set_item('canvas', $config);
		
		print_r($this->config->item('canvas'));
		
		if(is_writable(APPPATH .'helper/canvas_config_helper.php'))
		{
			$new_contents = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n";
			foreach($this->config->item('canvas') as $key => $item)
			{
				$new_contents .= "\$config['canvas']['$key'] = ".(is_string($item) ? "'$item'" : $item).";\n";
			}	
			
			file_put_contents(APPPATH .'helper/canvas_config_helper.php', $new_contents);	
		}
		
		print_r(file_get_contents(APPPATH .'helper/canvas_config_helper.php'));
		
		
		//$this->config->set_item('canvas
		/*
		// Fetch all canvass
		$this->data['canvass'] = $this->canvas_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/canvas/index';
		$this->load->view('admin/_layout_main', $this->data); */
	}

	public function edit ($id = NULL)
	{
		// Fetch a canvas or set a new one
		if ($id) {
			$this->data['canvas'] = $this->canvas_m->get($id);
			count($this->data['canvas']) || $this->data['errors'][] = 'canvas could not be found';
		}
		else {
			$this->data['canvas'] = $this->canvas_m->get_new();
		}
		
		// Set up the form
		$rules = $this->canvas_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->canvas_m->array_from_post(array(
				'cat_id', 
				'prod_name', 
				'slug', 
				'prod_desc', 
				'prod_price'
			));
			$this->canvas_m->save($data, $id);
			redirect('admin/canvas');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/canvas/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->canvas_m->delete($id);
		redirect('admin/canvas');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current canvas
		

		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$canvas = $this->canvas_m->get();
		
		if (count($canvas)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}