<?php
define("API_ROOT_PATH", __DIR__ . "/../");
// include main configuration file 
require_once dirname(__FILE__, $levels=3) . "/database_operations/Constants.php";
// include the base controller file 
require_once API_ROOT_PATH . "/Controller/Api/BaseController.php";
// include the use model file 
require_once API_ROOT_PATH . "/Model/UserModel.php";
?>