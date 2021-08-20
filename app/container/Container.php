<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
*/

namespace App\container;


use App\container\ContainerException;
use App\container\NotFoundException;
use App\container\ResolverClassInterface;
use App\container\ReflectionResolver;
use ReflectionClass;
use ReflectionMethod;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

use App\userClasses\message;


class Container implements ContainerInterface
{
    
    
    protected $instances = [];
    protected $hasConstructor;

    public function set($abstract, $concrete = NULL){

        if($concrete === NULL){
            $concrete = $abstract;
        }
        $this->instances[$abstract] = $concrete;
    }

    
  
    public function get($abstract, $parameters = [])
    {
        if ($this->has($abstract) === false) {
          throw new NotFoundException("No entry or class found for '$id'");
        }
         
        if(!isset($this->instances[$abstract])){
          $this->set($abstract);
        }
      
        
        if($this->hasConstructor === true){
            return $this->getClassConstructor($this->instances[$abstract], $parameters);
        }else{
           return $this->getClassMethods($this->instances[$abstract], $parameters); 
        }
    }

    
    public function hasConstructor($hasConstructor){
      return $this->hasConstructor = $hasConstructor;
    }
     

        public function has($id): bool
        {   
            if(class_exists($id)){
                return true;
            }else{
                return false;
            }
        }
    
       


    public function getClassMethods($class, $methodName){

        if($class instanceof  Closure)
        {
            return $class($this, $parameters);
        }

        $someclass = new ReflectionClass($class);

            //check if class is instantiable
            if(!$someclass->isInstantiable()){
                throw new Exception("Class {$concrete} is not instantiable");
            }

            $methods = $someclass->getMethods();

             /** if the class has no constructor do the below code */   
             $method = new ReflectionMethod( $class , $methodName);
    
            if( $method->isPrivate()){
                $method->setAccessible(true);
             }

            $parameters = $method->getParameters();  
            
           if(empty($parameters)){  
               return $method->invoke(new $class, $id = []);
           }else{
            foreach($parameters as $parameter){ 
              $reflectionClass = $parameter->getClass();
              if(isset($reflectionClass)){
                $dependency = $parameter->getClass()->getName();
                return $method->invoke(new $class, new $dependency, $d = [] );
              }else{
                return $method->invoke(new $class, $id = []);
              }
            }
          }
    }    



    public function getClassConstructor($concrete, $parameter)
    {

        if($concrete instanceof  Closure)
        {
         return $concrete($this, $parameters);
        }

        $reflector = new ReflectionClass($concrete);

            //check if class is instantiable
            if(!$reflector->isInstantiable()){
                throw new Exception("Class {$concrete} is not instantiable");
            }

             // get class constructor
            $constructor = $reflector->getConstructor();

            //var_dump($constructor);

            if(is_null($constructor)){
                //get new instance from class
                return $reflector->newInstance();
            }

            // get constructor parameters
            $parameters = $constructor->getParameters();
            $dependencies = $this->getDependencies($parameters);

            // get new instance with dependencies resolved
            return  $reflector->newInstanceArgs($dependencies);
        
    }


    public function getDependencies($parameters){

        $dependencies = [];

        foreach($parameters as $parameter){

            // get the type hinted class
            $dependency = $parameter->getClass();

            if($dependency === NULL){
               // check if default value for a parameter is available
               if($parameter->isDefaultValueAvailable()){
                   // get default value of parameter
                   $dependencies[] = $parameter->getDefaultValue();
               }else{
                   throw new Exception("Can not resolve class dependencies {$parameter->name}");
               }
            }else{
                // get dependency resolved
                $dependencies[] = $this->get($dependency->name);
            }
        }

        return $dependencies;
    }

 
 
}


