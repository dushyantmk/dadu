<?php
class Canvas_m extends MY_Model
{
	protected $_table_name = 'canvas';
	protected $_order_by = 'cat_id';
	public $rules = array(
		'id' => array(
			'field' => 'id', 
			'label' => 'canvas ID', 
			'rules' => 'trim|intval'
		), 
		'cat_id' => array(
			'field' => 'cat_id', 
			'label' => 'Category', 
			'rules' => 'trim|intval'
		), 
		'prod_name' => array(
			'field' => 'prod_name', 
			'label' => 'canvas Name', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'prod_prie' => array(
			'field' => 'prod_price', 
			'label' => 'canvas Price', 
			'rules' => 'trim|required|max_length[11]|xss_clean'
		),
		'prod_desc' => array(
			'field' => 'prod_desc', 
			'label' => 'canvas Description', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$canvas = new stdClass();
		$canvas->prod_name = '';
		$canvas->slug = '';
		$canvas->prod_desc = '';
		$canvas->cat_id = 1;
		$canvas->prod_price = '';
		return $canvas;
	}

}