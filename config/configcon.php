<?php 

 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

 $config = include __DIR__.'/../config/config.php';

 /* APP CONFIG CONSTANT  */

 define('_URL', $config->APP_URLS['baseUrl']);
 ////////////////////////////////////////////
 define('DB_DRIVER', $config->DB_CREDENTIALS['driver']);
 ///////////////////////////////////////////////////////
 define('DB_HOST', $config->DB_CREDENTIALS['host']);
 /////////////////////////////////////////////////////
 define('DB_NAME', $config->DB_CREDENTIALS['dbname']);
 /////////////////////////////////////////////////
 define('DB_USER', $config->DB_CREDENTIALS['user']);
 ////////////////////////////////////////////////////////
 define('DB_PASSWORD', $config->DB_CREDENTIALS['password']);
 ///////////////////////////////////////////////
 define('_SITENAME', $config->NAMES['SiteName']);
 ///////////////////////////////////////////////
 define('_APPNAME', $config->NAMES['AppName']);
 //////////////////////////////////////////////
 define('_VERSION', $config->NAMES['Version']);
 /////////////////////////////////////////////
 define('_AUTHOR', $config->NAMES['Author']);
 ////////////////////////////////////////////
 define('_APP_KEY', $config->NAMES['App_key']);
 ///////////////////////////////////////////////
 define('_UNIQUE_ID', $config->NAMES['Unique_Id']);
 ///////////////////////////////////////////////////
 define('_APP_STAGE',$config->APP_STAGE['app_stage']);
 ///////////////////////////////////////////////////
 
/* VERIXON DEFAULT FILE PATHS */

    define('DS', '\\');
    define('ROOT',getcwd().DS);
    define('APP_PATH', ROOT . 'app'. DS );
    define('PUBLIC_PATH', ROOT . 'public' . DS);
    define('CONFIG_PATH',ROOT. 'config' . DS);
    define('CONTROLLER_PATH',APP_PATH . 'controllers' . DS);
    define('ROUTER_PATH', APP_PATH . 'router' . DS);
    define('ROUTE_PATH', ROOT . 'Routes' . DS);
    define('MODEL_PATH', APP_PATH . 'model' . DS);
    define('VIEW_PATH', PUBLIC_PATH .'views' . DS);
    define('LIB_PATH', APP_PATH . 'lib' . DS );
    define('HELPER_PATH', APP_PATH . 'helpers' . DS);
    define('UPLOAD_PATH', PUBLIC_PATH . 'uploads' . DS);
    define('MIGRATIONS_PATH', APP_PATH . 'migrations' . DS);
    define('FILE_PATH', PUBLIC_PATH . 'uploadedFiles' . DS);
    define('TEMPLATE_PATH', PUBLIC_PATH . 'templates' . DS );

