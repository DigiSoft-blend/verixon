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

/**
 * Class ContainerResolver: altimate dependency injection class for reolving method and constructor dependencies
 *
 * @internal @verixon
 */
class ContainerResolver{

    //  /**
    //  * gets service class name with method for dependency resolver and option c = true or false for constructor present or abscent in class
    //  * 
    //  * @param $serivceClassName
    //  * @param array $method
    //  * @param array $c
    //  * 
    //  * @return mixed
    //  * 
    //  * @throws NotFoundException: ("service key '$serivceClassName' does not exist");
    //  *
    //  */

   // $serivceClassName, $method = [], $c = []
    
    public static function get( $serivceClassName, $method = [], $c = []){

        // $services = require 'services.php';
        // $container = new Container();
        $services = require(__DIR__.'/../services.php');
       // $container = new Container();

        echo 'in resolver';
       

        // if(array_key_exists($serivceClassName, $services)){
        //     $class = new ReflectionClass($services[$serivceClassName]);
        //         $constructor = $class->getConstructor();

        //         if(is_null($constructor) && empty($method)){
        //             echo "nothing";
        //         }else{
        //             $container->hasConstructor($c);
        //             $outputs =  $container->get( $services[$serivceClassName] , $method); 
        //             return $outputs;
        //         }
               
        // }else{
        //     throw new NotFoundException("service key '$serivceClassName' does not exist");
        // }
    }

}
