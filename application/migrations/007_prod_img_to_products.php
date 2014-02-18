<?php
/*Written by Dushyant Kanungo on 10 Feb 2014*/
class Migration_prod_img_to_products extends CI_Migration {

	public function up()
	{
		$fields = array(
			'prod_img' => array(
				'type' => 'VARCHAR',
				'constraint' => 120,
				'default' => 'default.png'
				),
		);
		
		$this->dbforge->add_column('products',$fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('products', 'prod_img');
	}
}
?>