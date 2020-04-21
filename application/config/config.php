<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DOMAIN', 'e-book.cii3.net');

define('BASE_URL', 'https://'.DOMAIN);
define('IMAGE_BASE_URL', 'https://image.cii3.net/'.DOMAIN);
define('API_BASE_URL', 'https://api.cii3.net/'.DOMAIN);

define('default_controller', 'main');
define('error_controller', 'error_view');

define('db_host', 'localhost');
define('db_name', 'e-book-db');
define('db_username', 'e-book-db');
define('db_password', 'pass-e-book-db');

define('THEME', 'lnwphpTheme');
define('DEBUGGING_BACK', false);
define('DEBUGGING', false);
define('CACHING', false);
define('COMPILECHECK', true);
define('CACHE_LIFETIME', 3600);
define('REMOVE_CAHE_OLD_SECONDS', CACHE_LIFETIME * 2);

define('cat1', 'Cate 1');
define('cat2', 'Cate 2');
define('cat3', 'Cate 3');

define('admin_user', 'admin');
define('admin_pass', '1234');
