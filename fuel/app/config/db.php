<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'development' => array(
		'type'           => 'mysqli',
		'connection'     => array(
			'hostname'       => 'faure.cs.colostate.edu',
			'port'           => '3306',
			'database'       => 'anthos',
			'username'       => 'anthos',
			'password'       => '830655911',
			'persistent'     => false,
			'compress'       => false,
		),
		'identifier'     => '`',
		'table_prefix'   => '',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => false,
	),

);
