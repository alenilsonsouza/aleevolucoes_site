<?php
require 'environment.php';
date_default_timezone_set('America/Sao_Paulo');
global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}
define("AUTOR", "");
$config['defaut_lang'] = 'pt-br';


$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);