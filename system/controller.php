<?php

class Controller {
	
	public function loadModel($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name,$isbackend=false)
	{
		$view = new View($name,$isbackend);
		return $view;
	}
	
	public function loadPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}
	
	public function loadHelper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}

	public function loadAdmin(){
		require APP_DIR.'libs/xcrud.php';
		$xcrud = Xcrud::get_instance();
		$xcrud->connection(db_username,db_password,db_name,db_host);
		$xcrud->unset_print();
		$xcrud->unset_csv();
		return $xcrud;
	}
	
	public function redirect($loc)
	{
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}

}

?>