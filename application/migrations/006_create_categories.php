<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/

class Migration_Create_categories extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cat_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),	
			'cat_desc' => array(
				'type' => 'TEXT',
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('categories');
	}

	public function down()
	{
		$this->dbforge->drop_table('categories');
	}
}
?>