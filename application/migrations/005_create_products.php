<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
class Migration_Create_products extends CI_Migration {

	public function up()
	{
		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cat_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
			),	
			'prod_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'prod_price' => array(
				'type' => 'VARCHAR',
				'constraint' => '11',
			),
			'prod_desc' => array(
				'type' => 'TEXT',
			),
		);
		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('products');
	}

	public function down()
	{
		$this->dbforge->drop_table('products');
	}
}
?>