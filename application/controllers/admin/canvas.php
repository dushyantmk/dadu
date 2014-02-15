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
	
	// logo upload function
        function do_upload()
	{
		
	}
	
	public function save()
	{
		// Set up the form
		//$rules = $this->canvas_m->rules;
		//$this->form_validation->set_rules($rules);

		// Process the form
		//if ($this->form_validation->run() == TRUE) {
			echo 'hello';
			$this->config->set_item('canvas', $this->array_from_post(array(
				'dimensions_width', 
				'dimensions_height', 
				'logo_url', 
				'logo_x', 
				'logo_y',
				'product_x',
				'product_y',
				'text_box_0_x',
				'text_box_0_y',
				'text_box_1_x',
				'text_box_1_y',
				//'text_colour',
				//'text_font',
				//'text_weight',
				//'text_size',
			)));
			
			$config['upload_path'] = ('images/canvas');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/canvas/index', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$this->load->view('admin/canvas/index', $data);
			}
			
			Canvas_helper::save_config_file();
			redirect('admin/canvas');
		//}
		
		// Load the view
		$this->data['subview'] = 'admin/canvas/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		var_dump($data);
		return $data;
	}
}