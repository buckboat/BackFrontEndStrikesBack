<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'Apache24'.DS.'htdocs'.DS.'BackFrontEndStrikesBack');
    defined('API_ROOT') ? null : define('API_ROOT', SITE_ROOT.DS.'access');
    defined('INC_PATH') ? null : define('INC_PATH', API_ROOT.DS.'includes');
    defined('CORE_PATH') ? null : define('CORE_PATH', API_ROOT.DS.'core');
    
    // defined('') ? null : define('', );

    //
    require_once(SITE_ROOT.DS.'database_operations'.DS."DBConnection.php");

    //setup database engine
    $db = new DBConnection();

?>