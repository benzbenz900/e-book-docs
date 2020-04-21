<?php

class run
{
	public function pipe_mvc()
	{
		global $config;

    	// Set our defaults
		$controller = default_controller;
		$action = 'index';
		$url = '';

		// Get request url and script url
		$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
		$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

		// Get our url path and trim the / of the left and the right
		if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

		// Split the url into segments
		$segments = explode('/', $url);

		// Do our default checks
		if(isset($segments[0]) && $segments[0] != '') $controller = $segments[0];
		if(isset($segments[1]) && $segments[1] != '') $action = $segments[1];
		if(is_numeric($action)){
			$action = 'index';
			$segments = array_merge(array_slice($segments, 0, 1), array('index'), array_slice($segments, 1));
		}

		// Get our controller file
		$path = APP_DIR . 'controllers/' . $controller . '.php';
		if(file_exists($path)){
			require_once($path);
		} else {
			$controller = error_controller;
			require_once(APP_DIR . 'controllers/' . $controller . '.php');
		}

    	// Check the action exists
		if(!method_exists($controller, $action)){
			$controller = error_controller;
			require_once(APP_DIR . 'controllers/' . $controller . '.php');
			$action = 'index';
		}

		// Create object and call method
		$obj = new $controller;
		die(call_user_func_array(array($obj, $action), array_slice($segments, 2)));
	}
}

?>
