<?php
class Category_m extends MY_Model
{
	protected $_table_name = 'categories ';
	protected $_order_by = '';
	public $rules = array(
		'id' => array(
			'field' => 'id', 
			'label' => 'category ID', 
			'rules' => 'trim|intval'
		),  
		'cat_name' => array(
			'field' => 'cat_name', 
			'label' => 'category Name', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'cat_desc' => array(
			'field' => 'cat_desc', 
			'label' => 'Category Description', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$category = new stdClass();
		$category->cat_name = '';
		$category->slug = '';
		$category->cat_desc = '';
		return $category;
	}

}