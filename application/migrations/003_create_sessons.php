<?php
/*Written by Dushyant Kanungo on 06 Feb 2014*/
class Migration_Create_sessons extends CI_Migration {

	public function up()
	{
		$fields = array(
			'session_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'default' => 0,
				'null' => FALSE
				),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'default' => 0,
				'null' => FALSE
			),
			'user_agent' => array(
				'type' => 'VARCHAR',
				'constraint' => '120',
				'default' => 0,
				'null' => FALSE
			),
			'last_activity' => array(
				'type' => 'INT',
				'constraint' => '10',
				'default' => 0,
				'null' => FALSE,
				'unsigned' => TRUE
			),	
			'user_data' => array(
				'type' => 'TEXT',
				'null' => FALSE,
			),
		);
		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('session_id', TRUE);
		$this->dbforge->create_table('sessions');
		$this->db->query('ALTER TABLE `dmp_sessions` ADD KEY `last_activity_idx` (`last_activity`)');
	}

	public function down()
	{
		$this->dbforge->drop_table('sessions');
	}
}
?>