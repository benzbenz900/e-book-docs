<?php

class Error_view extends Controller {
	
	function index($codeerror='404')
	{
		if(!is_numeric($codeerror)){
			$codeerror='404';
		}
		$this->error404($codeerror);
	}
	
	function error404($codeerror)
	{
		
		header('Content-Type: text/html; charset=utf-8');
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			header("HTTP/2.0 404 Not Found");
		}else{
			header("HTTP/2.0 404 Not Found");
		}
		$t = $this->loadView('sectionLayout/404');
		$t->render();
	}
	
}

?>
