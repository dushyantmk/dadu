<?php
/*Written by Dushyant Kanungo on 10 Feb 2014*/
class Migration_Parent_id_to_pages extends CI_Migration {

	public function up()
	{
		$fields = array(
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'default' => 0,
				'unsigned' => TRUE,
				),
		);
		
		$this->dbforge->add_column('pages',$fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('pages', 'parent_id');
	}
}
?>