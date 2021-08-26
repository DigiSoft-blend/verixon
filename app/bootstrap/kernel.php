<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\Bootstrap;

/**
 * Class Kernel
 *
 * @internal @verixon
*/
class kernel
{
    /**
     * starts a verixon application via verixons kernel
     * 
     * @return  : ROUTE_PATH
     *
     * @see http://Digisoft-blend/verixon/
    */
    public static function StartVerixon()
    {
     require_once ROUTE_PATH . 'routes.php'; 
    }   

}

