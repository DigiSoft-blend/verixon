<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\redirect;

use Symfony\Component\HttpFoundation\RedirectResponse;

class Redirect{

    public function url($url)
    {
      header('Location:'. $url , http_response_code(404));
      exit();
    }

    public function redirect($location)
    {
      return  $response = new RedirectResponse($location);
    }

}