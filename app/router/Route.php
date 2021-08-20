<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */


namespace App\router;

use App\http\Request;

class Route{
    
private static  $url;
private static  $urlKeys;
private static  $urlStringVars;
private static  $urlValues;


    public static function get($url, $function, $urlStringVars = null)
    {
        self::$url = filter_var($url, FILTER_SANITIZE_URL);

        $request = new Request;
        $requestUri =  $request->getRequestUri();

         $uriArray = explode('/', $requestUri, +3);
         $requestUriParams = end($uriArray);
         
         $urlString = explode('/', self::$url, +3);
         $urlWildcardParams = end($urlString);

         $urlKeys = explode('/',$urlWildcardParams);

         $newUri = str_replace($urlStringVars, $requestUriParams  , self::$url);
         
         self::$urlKeys = $urlKeys;
         self::$urlValues = explode('/', $requestUriParams);
         
         if(isset($requestUri)){
          if($requestUri === $newUri){
            $function->__invoke();
          }else{
            http_response_code(404);
          } 
         }
         
       } 
      
   
    public static function getUriParams(){
       $uriParamsWithKey = array_combine(self::$urlKeys, self::$urlValues);
       return $uriParamsWithKey;
    }
    
  }