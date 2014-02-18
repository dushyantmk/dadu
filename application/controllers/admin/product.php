<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dadu -> Controller -> Admin -> Product
 *
 * Handles the creation, editing and deletion of products from Dadu.
 *
 * @package Dadu
 * @since 0.1
 * @author Dushyant Kanungo <dushyantkanungo@yahoo.com>
 * @author Ben Argo <ben@benargo.com>
 * @copyright Copyright 2013 Dushyant Kanungo
 */
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

	/**
	 * edit()
	 *
	 * Handles the creation and editing of products
	 *
	 * @access public
	 * @param int $id - Optional, an ID number of an existing product
	 * @return text/html
	 */
	public function edit($id = NULL)
	{
		// Fetch a product or set a new one
		if ($id) 
		{
			$this->data['product'] = $this->product_m->get($id);
			count($this->data['product']) || $this->data['errors'][] = 'product could not be found';
		}
		else 
		{
			$this->data['product'] = $this->product_m->get_new();
		}
		
		// Set up the form
		$rules = $this->product_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() === TRUE) 
		{
			$data = $this->product_m->array_from_post(array(
				'cat_id', 
				'prod_name', 
				'slug', 
				'prod_desc', 
				'prod_price',
			));

			$data['prod_img'] = $this->do_upload();
		
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
	
	/**
	 * do_upload()
	 *
	 * Handles the upload of product images
	 *
	 * @access private
	 * @return string - the name of the file we just uploaded.
	 */
	private function do_upload()
	{
		// Define some upload configuration
		$config['upload_path'] = FCPATH .'images/products/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '250';
		$config['max_width']  = '500';
		$config['max_height']  = '500';
	
		// Load the file upload class
		$this->load->library('upload', $config);

		// Handle the upload
		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			$this->load->view('admin/product/edit', $data);
			return $this->data['product']->prod_img;
		}
		else
		{
			$data = $this->upload->data();

			return $data['file_name'];
		}

		return $this->data['product']->prod_img;
	}
}

// End of product.php

