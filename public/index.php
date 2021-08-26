<?php
 
 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 


 require_once __DIR__.'/../vendor/autoload.php'; //require verixons autoloader

 $configcon = include __DIR__.'/../config/configcon.php'; //require verixons default configuration

 use App\bootstrap\app;
 
 
    $verixon = new App(); //creates a new verixon app instance
 

