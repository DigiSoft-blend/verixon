<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\bootstrap;


class kernel{

    public static function StartVerixon(){
       require_once ROUTE_PATH . 'routes.php'; 
    }

}

