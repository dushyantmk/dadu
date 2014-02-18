<?php
class Product extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('category_m');
	}

	public function index ()
	{
		// Fetch all products
		$this->data['products'] = $this->product_m->get();
		$this->data['categories'] = $this->category_m->get();
		// Load view
		$this->data['subview'] = 'admin/product/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		// Fetch a product or set a new one
		if ($id) {
			$this->data['product'] = $this->product_m->get($id);
			count($this->data['product']) || $this->data['errors'][] = 'product could not be found';
		}
		else {
			$this->data['product'] = $this->product_m->get_new();
		}
		
		// Set up the form
		$rules = $this->product_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->product_m->array_from_post(array(
				'cat_id', 
				'prod_name', 
				'slug', 
				'prod_desc', 
				'prod_price'
			));
			$this->product_m->save($data, $id);
			redirect('admin/product');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/product/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->product_m->delete($id);
		redirect('admin/product');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current product
		

		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$product = $this->product_m->get();
		
		if (count($product)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}