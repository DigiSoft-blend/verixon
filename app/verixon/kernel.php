<?php

namespace App\verixon;

class Kernel
{
   public function __construct(){
     require(__DIR__.'/../routes.php');
   }
}