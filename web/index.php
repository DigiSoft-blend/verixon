<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

 require('./vendor/autoload.php');

 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

 use App\Bootstrap\App;
 
  $verixon = new App(); //creates a new verixon app instance
 


//echo "verixon";