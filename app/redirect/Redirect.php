<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\redirect;

use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class Redirect: verixons driver for redirecting clients to spacified url
 *
 * @internal @verixon
*/ 
class Redirect{
    
   /**
     * sets url location to redirect to
     * 
     * @return : location: $url 
    */
    public function url($url)
    {
      header('Location:'. $url , http_response_code(404));
      exit();
    }
    /**
     * sets url location to redirect to: API specific
     * 
     * @return RedirectResponse instance
    */
    public function redirect($location)
    {
      return  $response = new RedirectResponse($location);
    }

}