<?php
if(isset($url[1])):
	if(isset($url[2])):
		try{
			$controllerName = 'Controller\\'.ucfirst($url[1]).'Controller';
			$controller = new $controllerName();
			$field1 = isset($url[3])?$url[3]:null;
			$field2 = isset($url[4])?$url[4]:null;
			$method = (string)$url[2];
			print $controller->$method($field1,$field2);
		}	catch(Exception $error) {
			header('HTTP/1.0 404 Not found');
			print '<h1>Error!</h1>';
			print $error->getMessage();
		  exit;
		}
		exit;
	else:
		header('HTTP/1.0 403 Forbidden');
    exit('<h1>Not Found!</h1>');
	endif;
else:
	header('HTTP/1.0 403 Forbidden');
	exit('<h1>Not Found!</h1>');
endif;
