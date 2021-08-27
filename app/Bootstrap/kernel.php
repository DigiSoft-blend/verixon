<?php

namespace App\Bootstrap;

class Kernel
{
   public function __construct(){
     require(__DIR__.'/../routes.php');
   }
}