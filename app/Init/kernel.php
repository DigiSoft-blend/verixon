<?php

namespace App\Init;

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */ 

class kernel
{
   public function startverixon(){
     require('../Routes/routes.php');
   }
}