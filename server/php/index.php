<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

// error_reporting(E_ALL | E_STRICT);
if(empty($_GET['idFolder'])){
	exit();
}else{
	session_start();
}

if (
	$_SERVER['REQUEST_METHOD'] === 'DELETE' ||
	$_SERVER['REQUEST_METHOD'] === 'POST' ||
	$_SERVER['REQUEST_METHOD'] === 'PUT' ||
	$_SERVER['REQUEST_METHOD'] === 'PATCH'
	) {
  	if(empty($_SESSION['adminSession'])){
		exit();
	}else{
		if($_SESSION['adminSession'] !== md5("benzadminlnwphp0641235678")){
			exit();
		}
	}
}
require('UploadHandler.php');
// $upload_handler = new UploadHandler();
class CustomUploadHandler extends UploadHandler {
    protected function get_user_id() {
		if (!file_exists("/server/php/files/".$_GET['idFolder'])) {
			mkdir("/server/php/files/".$_GET['idFolder'], 0777, true);
		}
        return $_GET['idFolder'];
    }
}

$upload_handler = new CustomUploadHandler(array(
    'user_dirs' => true,
	'download_via_php'=>true,
	'script_url'=>'/server/php/index.php?idFolder='.$_GET['idFolder'],
	'access_control_allow_credentials'=>true,
	'delete_type'=>'POST',
	'readfile_chunk_size' => 400 * 1024 * 1024,
	'max_file_size'=>400
));