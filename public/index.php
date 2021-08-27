<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

 use App\Init\kernel;

 require(__DIR__.'/../vendor/autoload.php');

 //require verixons default configuration
 
 $configcon = include __DIR__.'/../config/configcon.php'; 

 //creates a new verixon app instance

 $kernel = new kernel(); 
 $kernel->startverixon();


