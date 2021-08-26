<?php

namespace App\Bootstrap;

/**
 * Class app
 *
 * @internal @verixon
*/

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