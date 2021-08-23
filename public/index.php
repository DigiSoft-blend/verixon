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
 
  if( _APPNAME === 'Verixon' &&  _AUTHOR === 'Silas Udofia'){
    $verixon = new App(); //creates a new verixon app instance
  }else{
    http_response_code('505'); //returns this if verixon credentials changed
  }

