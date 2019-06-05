<?php

//for use with migrations assignment CT310 HW4, not Project 2

class Model_Migrationstatus extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'version_num',
		'name',
		'status',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'migrationstatus';

}
