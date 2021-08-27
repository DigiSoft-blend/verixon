<?php

namespace App\verixon;

class Kernel
{
   public function startverixon(){
     require(__DIR__.'/../routes.php');
   }
}