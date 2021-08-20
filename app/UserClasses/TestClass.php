<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\UserClasses;

use App\UserClasses\Message;

class TestClass
{   
    private $message; 
    
    public function  __construct(message $m)
    {
      $this->message = $m;
    }


    public function printMessage()
    {
      return $this->message->send();
    }

}
