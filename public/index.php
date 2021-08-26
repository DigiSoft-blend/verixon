<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 


 require_once __DIR__.'/../autoload.php'; //require verixons autoloader
//require('../vendor/autoload.php');
 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

 use App\bootstrap\App;
 
  $verixon = new App(); //creates a new verixon app instance
 


//echo "verixon";