<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;
if($_SERVER['HTTP_HOST'] == 'localhost') {
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		// 'username' => 'debian-sys-maint',
		// 'password' => 'C7KsJB3vU2gMQwsa',
		'username' => 'root',
		'password' => '',
		'database' => 'well_report',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
} else {
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
    	'username' => 'u135485345_wellnessReport',
    	'password' => 'D:rTX8[1',
    	'database' => 'u135485345_reportWellness',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
}
