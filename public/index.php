<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

 use App\Bootstrap\kernel;

 require(__DIR__.'/../vendor/autoload.php');

 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

 $verixonApp = new kernel(); //creates a new verixon app instance
 
//require_once ROUTE_PATH . 'routes.php'; 



