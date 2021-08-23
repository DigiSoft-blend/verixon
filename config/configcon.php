<?php 

/** 
* Verixon - A PHP Framework For Web Devs
* 
* verixons default config definitions
*
* @package  Verixon
* @author   Silas Udofia <Silas@Verixon.com>
* 
* @return :verixons constants
*/

 $config = include __DIR__.'/../config/config.php';

 /* APP CONFIG CONSTANT  */

 /**
  * @const _APPNAME
  */
 define('_APPNAME', $config->NAMES['AppName']);
 /**
  * @const _AUTHOR
  */
 define('_AUTHOR', $config->NAMES['Author']);
 /**
  * @const _APP_KEY
  */
 define('_APP_KEY', $config->NAMES['App_key']);
 /**
  * @const _UNIQUE_ID
  */
 define('_UNIQUE_ID', $config->NAMES['Unique_Id']);


/* VERIXON DEFAULT FILE PATHS */
   
 /**
  * @const DS : Directory Seperator
  */
    define('DS', '\\');
 /**
  * @const ROOT : verixons root directory
  */   
    define('ROOT',getcwd().DS);
 /**
  * @const APP_PATH : verixons app directroy path
  */   
    define('APP_PATH', ROOT . 'app'. DS );
 /**
  * @const PUBLIC_PATH : verixons public directory path
  */   
    define('PUBLIC_PATH', ROOT . 'public' . DS);
 /**
  * @const CONFIG_PATH : verixons config directory path
  */ 
    define('CONFIG_PATH',ROOT. 'config' . DS);
 /**
  * @const CONTROLLER_PATH : verixons controllers directory path
  */     
    define('CONTROLLER_PATH',APP_PATH . 'controllers' . DS);
 /**
  * @const ROUTER_PATH : verixons router directory path
  */   
    define('ROUTER_PATH', APP_PATH . 'router' . DS);
 /**
  * @const ROUTE_PATH : verixons routes directory path
  */   
    define('ROUTE_PATH', ROOT . 'Routes' . DS);
 /**
  * @const MODEL_PATH : verixons model directory path
  */    
    define('MODEL_PATH', APP_PATH . 'model' . DS);
 /**
  * @const VIEW_PATH : verixons views directory path
  */   
    define('VIEW_PATH', PUBLIC_PATH .'views' . DS);
 /**
  * @const LIB_PATH : verixons lib directory path
  */   
    define('LIB_PATH', APP_PATH . 'lib' . DS );
 /**
  * @const HELPER_PATH : verixons helpers directory path
  */   
    define('HELPER_PATH', APP_PATH . 'helpers' . DS);
 /**
  * @const UPLOAD_PATH : verixons uploads directory path
  */  
    define('UPLOAD_PATH', PUBLIC_PATH . 'uploads' . DS);
 /**
  * @const MIGRATIONS_PATH : verixons migrations directory path
  */    
    define('MIGRATIONS_PATH', APP_PATH . 'migrations' . DS);
 /**
  * @const FILE_PATH : verixons uploadedFiles directory path
  */    
    define('FILE_PATH', PUBLIC_PATH . 'uploadedFiles' . DS);
 /**
  * @const TEMPLATE_PATH : verixons templates directory path
  */    
    define('TEMPLATE_PATH', PUBLIC_PATH . 'templates' . DS );

