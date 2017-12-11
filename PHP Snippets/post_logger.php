<?php

// Get Full URI
$request = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];

// Get IP Address
$ipAddress = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');

// Check for 64 Packets in b64
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	if (isset($_GET['b64cont'])) {
 		echo "Go away ip ".$ipAddress;
		error_log('GET FLAG '. $ipAddress);
		error_log('Index GET Debug: ' . print_r($request,true));
		die();
	}
}

// Check and output Post Information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	

	foreach($_POST as $key => $value) {
	    
	    if (strpos($key, 'inject') === 0) {
		    echo "Go away ip ".$ipAddress;
		    error_log('Go away ip '. $ipAddress);
		    error_log('Index POST Debug: ' . print_r($_POST,true));
		    die;
		}

		error_log('Index POST Debug: ' . print_r($_POST,true));
	}
}
