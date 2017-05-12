<?php
session_start();

if(file_exists('cache/countries.csv')):
	if(date("F d Y H:i:s.",filemtime('cache/countries.csv')) <= date("Y/m/d h:i:s", strtotime("-5 minutes"))):
		require_once 'config/generateFile.php';
	endif;
else:
	require_once 'config/generateFile.php';
endif;

if(isset($_GET['param'])):
	$url = explode('/',$_GET['param']);
endif;

if(isset($url[0]) && $url[0] != 'ajax'):
	if(!isset($_SESSION['_token'])):
	    $_SESSION['_token'] = md5(uniqid(rand(),TRUE));
	    $_SESSION['_token_time'] = time();
	endif;
endif;

require_once 'config/general.php';
require_once 'vendor/autoload.php'; // COMPOSER AUTOLOAD IS REQUIRED!

if(isset($url[0]) && $url[0] == 'ajax'):
	require_once 'public/ajaxResponse.php';
else:
	require_once 'public/index.php';
endif;
