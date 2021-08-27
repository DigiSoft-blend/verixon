<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

 require(__DIR__.'/../vendor/autoload.php');

 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

//  use App\Bootstrap\App;
 
//   $verixon = new App(); //creates a new verixon app instance
 
//require_once ROUTE_PATH . 'routes.php'; 

require(__DIR__.'/../routes.php');

