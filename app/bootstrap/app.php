<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\Bootstrap;

/**
 * Class app
 *
 * @internal @verixon
*/
use App\Bootstrap\kernel;

/**
 * starts a verixon application via verixons kernel
 * 
 * @return  kernel : verixon app
 *
 * @see http://Digisoft-blend/verixon/
*/

class App
{
  public function __construct(){
     kernel::StartVerixon();
  }
}