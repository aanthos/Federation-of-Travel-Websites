<?php

namespace Fuel\Migrations;

class Modify_smallint
{
	public function up()
	{
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

                \DBUtil::modify_fields('tests', array(
                    '_string' => array('type' => 'text'),
                ));
	}

	public function down()
	{
		\DBUtil::modify_fields('tests', array(
                    '_string' => array('constraint' => 255, 'type' => 'varchar')
                ));
	}
}