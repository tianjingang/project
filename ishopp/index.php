<?php
$iweb = dirname(__FILE__)."/lib/iweb.php";
$config = dirname(__FILE__)."/config/config.php";
include './config.inc.php';
include './uc_client/client.php';
include './include/db_mysql.class.php';
require($iweb);
IWeb::createWebApp($config)->run();
?>