<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */


namespace App\router;

use App\http\Request;

/**
 * Class Route: verixons Router 
 *
 * @internal @verixon
*/ 
class Route{

 /**
  * @var string $url
  */   
private static  $url;
 /**
  * @var string $urlKeys
  */ 
private static  $urlKeys;
 /**
  * @var string $urlStringVars
  */ 
private static  $urlStringVars;
/**
  * @var string $urlValues;
  */ 
private static  $urlValues;

  /**
   * routes url to verixons controller with defined method
   * 
   * @param string $url
   * @param function 
   * @param string $urlStringVars
   * 
   * @return mixed : function : httpresponse code
   *
  */
  // public static function get($url, $function, $urlStringVars = null)
  // {
  //     self::$url = filter_var($url, FILTER_SANITIZE_URL);// filters and sanitizes a url

  //     $request = new Request; // creates a request instance
  //     $requestUri =  $request->getRequestUri(); //gets SERVER['REQUEST_URI']

  //     $uriArray = explode('/', $requestUri, +3); //converts the request uri for example: name/email/2/3 to array(3) { [0]=> string(0) "" [1]=> string(4) "name" [2]=> string(9) "email/2/3" }
  //     $requestUriParams = end($uriArray);
      
  //     $urlString = explode('/', self::$url, +3);
      
  //     $urlWildcardParams = end($urlString);
    
  //     $urlKeys = explode('/',$urlWildcardParams);

  //     $newUri = str_replace($urlStringVars, $requestUriParams  , self::$url);
      
  //     self::$urlKeys = $urlKeys;
  //     self::$urlValues = explode('/', $requestUriParams);
      
  //     if(isset($requestUri)){
  //     if($requestUri === $newUri){
  //       $function->__invoke();
  //     }else{
  //       http_response_code(404);
  //     } 
  //   }  
  // } 

  public static function get()
  {
    //   self::$url = filter_var($url, FILTER_SANITIZE_URL);// filters and sanitizes a url

    //   $request = new Request; // creates a request instance
    //   $requestUri =  $request->getRequestUri(); //gets SERVER['REQUEST_URI']

    //   $uriArray = explode('/', $requestUri, +3); //converts the request uri for example: name/email/2/3 to array(3) { [0]=> string(0) "" [1]=> string(4) "name" [2]=> string(9) "email/2/3" }
    //   $requestUriParams = end($uriArray);
      
    //   $urlString = explode('/', self::$url, +3);
      
    //   $urlWildcardParams = end($urlString);
    
    //   $urlKeys = explode('/',$urlWildcardParams);

    //   $newUri = str_replace($urlStringVars, $requestUriParams  , self::$url);
      
    //   self::$urlKeys = $urlKeys;
    //   self::$urlValues = explode('/', $requestUriParams);
      
    //   if(isset($requestUri)){
    //   if($requestUri === $newUri){
    //     $function->__invoke();
    //   }else{
    //     http_response_code(404);
    //   } 
    // }  
    echo 'function is working';
  } 
  
    
  /**
   * gets url paramerters from url string
   * 
   * @return array  $uriParamsWithKey
   *
  */
  public static function getUriParams(){
      $uriParamsWithKey = array_combine(self::$urlKeys, self::$urlValues);
      return $uriParamsWithKey;
  }
  
}