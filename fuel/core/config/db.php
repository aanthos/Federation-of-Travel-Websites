<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(

	/*
	 * If you don't specify a DB configuration name when you create a connection
	 * the configuration to be used will be determined by the 'active' value
	 */
	'active' => 'default',

	/**
	 * Base PDO config
	 */
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => '',
			'hostname'   => '',
			'username'   => null,
			'password'   => null,
			'database'   => '',
			'persistent' => false,
			'compress'   => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'collation'    => false,
		'enable_cache' => true,
		'profiling'    => false,
		'readonly'     => false,
	),

	/**
	 * Base MySQLi config
	 *

	'default' => array(
		'type'        => 'mysqli',
		'connection'  => array(
			'dsn'        => '',
			'hostname'   => '',
			'username'   => null,
			'password'   => null,
			'database'   => '',
			'persistent' => false,
			'compress'   => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'collation'    => false,
		'enable_cache' => true,
		'profiling'    => false,
		'readonly'     => false,
	),
	 */
	 
	/**
	* Base MySQLi config
	*/
		
	'default' => array(
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

	/**
	 * Base Redis config
	 */
	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
			'timeout'	=> null,
			'database'  => 0,
		),
	),

);
