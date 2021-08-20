<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
*/

namespace App\container;

use ReflectionClass;
use ReflectionParameter;
use ReflectionMethod;

class ContainerResolver{
    
    public function get($serivceClassName, $method = [], $c = []){

        $services = require 'services.php';
        $container = new Container();

        if(array_key_exists($serivceClassName, $services)){
            $class = new ReflectionClass($services[$serivceClassName]);
                $constructor = $class->getConstructor();

                if(is_null($constructor) && empty($method)){
                    echo "nothing";
                }else{
                    $container->hasConstructor($c);
                    $outputs =  $container->get( $services[$serivceClassName] , $method); 
                    return $outputs;
                }
               
        }else{
            throw new NotFoundException("service key '$serivceClassName' does not exist");
        }
    }

}
