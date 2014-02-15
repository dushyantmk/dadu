<?php
class Product_m extends MY_Model
{
	protected $_table_name = 'products';
	protected $_order_by = 'cat_id';
	public $rules = array(
		'id' => array(
			'field' => 'id', 
			'label' => 'Product ID', 
			'rules' => 'trim|intval'
		), 
		'cat_id' => array(
			'field' => 'cat_id', 
			'label' => 'Category', 
			'rules' => 'trim|intval'
		), 
		'prod_name' => array(
			'field' => 'prod_name', 
			'label' => 'Product Name', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'prod_prie' => array(
			'field' => 'prod_price', 
			'label' => 'Product Price', 
			'rules' => 'trim|required|max_length[11]|xss_clean'
		),
		'prod_desc' => array(
			'field' => 'prod_desc', 
			'label' => 'Product Description', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$product = new stdClass();
		$product->prod_name = '';
		$product->slug = '';
		$product->prod_desc = '';
		$product->cat_id = 1;
		$product->prod_price = '';
		return $product;
	}

}