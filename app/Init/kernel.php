<?php

namespace App\Init;

class Kernel
{
   public function startverixon(){
     require(__DIR__.'/../routes.php');
   }
}