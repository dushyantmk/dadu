<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/

class Migration_Create_canvas extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
		
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			
			// Canvas Dimentions		
			
			'can_width' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			'can_height' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			
			// Brand Logo
			
			'logo' => array(
				'type' =>'BLOB',
				'null' => TRUE,			
			),
			
			'logo_x' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			'logo_y' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			
			// Product
			
			'prod_img' => array(
				'type' =>'BLOB',
			),
			'prod_x' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			'prod_y' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			
			// Customised Text
			
			'txt_1_x' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			'txt_1_y' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			
			'txt_2_x' => array(
				'type' => 'INT',
				'constraint' => 11,		
				'unsigned' => TRUE,
			),
			'txt_2_y' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,		
			),
			
			'txt_colour' => array(
				'type' => 'BOOL',
				'constraint' => 1,
				'default' => FALSE,		
			),
			'txt_font' => array(
				'type' => 'BOOL',
				'constraint' => 1,		
				'default' => FALSE,		
			),
			'txt_weight' => array(
				'type' => 'BOOL',
				'constraint' => 1,		
				'default' => FALSE,		
			),
			'txt_size' => array(
				'type' => 'BOOL',
				'constraint' => 1,		
				'default' => FALSE,		
			),
			
			
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('canvas');
	}

	public function down()
	{
		$this->dbforge->drop_table('canvas');
	}
}
?>