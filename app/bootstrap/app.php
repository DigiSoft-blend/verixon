<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\bootstrap;

use App\bootstrap\kernel;

class app{

  public function __construct(){
     kernel::StartVerixon();
  }
  
}