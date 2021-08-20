<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\bootstrap;

use App\hashing\hash;

class kernel{

    public static function StartVerixon($unique_id, $key){
          if(hash::verifyThis( $unique_id, $key )){
             require_once ROUTE_PATH . 'routes.php'; 
          }else{
              http_response_code(404);
          }  
    }

}

