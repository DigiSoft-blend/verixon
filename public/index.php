<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

 use App\Init\kernel

 require(__DIR__.'/../vendor/autoload.php');

 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

 //require(__DIR__.'/../routes.php');

 $kernel = new kernel(); //creates a new verixon app instance
 $kernel->startverixon();


