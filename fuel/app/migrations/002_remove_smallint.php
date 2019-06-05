<?php

namespace Fuel\Migrations;

class Remove_smallint
{
	public function up()
	{      //from 001 and on here for reference
// 		\DBUtil::create_table('tests', array(
// 			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
// 			'_varchar' => array('constraint' => 50, 'type' => 'varchar'),
// 			'_string' => array('constraint' => 255, 'type' => 'varchar'),
// 			'_integer' => array('constraint' => 11, 'type' => 'int'),
// 			'_text' => array('type' => 'text'),
// 			'_double' => array('type' => 'double'),
// 			'_tinyint' => array('type' => 'tinyint'),
// 			'_smallint' => array('type' => 'smallint'),
// 			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
// 			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
// 
// 		), array('id'));

                
                //Removes one field from the database table
                    \DBUtil::drop_fields('tests', '_smallint');
	}

	public function down()
	{      //this is what 001 does
                //\DBUtil::drop_table('tests');
		
		\DBUtil::add_fields('tests', array(
                    '_smallint' => array('type' => 'smallint'),
                ));
		
	}
}