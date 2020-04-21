<?php
//Check PHP Version >= 7
if (version_compare(phpversion(), '7', '<')) {
    ?>
	<div style="text-align: -webkit-center;text-align: center;">
		Need PHP 7 for some functions<br/>
		ต้องการ PHP 7 สำหรับบ้าง ฟังก์ชั่น
		<hr>
		Your PHP version: <?php echo phpversion(); ?>
	</div>
	<?php
exit();
}

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) . '/');
define('APP_DIR', ROOT_DIR . 'application/');

// Includes
require APP_DIR . 'config/config.php';
require ROOT_DIR . 'system/model.php';
require ROOT_DIR . 'system/view.php';
require ROOT_DIR . 'system/controller.php';
require ROOT_DIR . 'system/pipe_mvc.php';

$run = new run;
$run->pipe_mvc();

?>
