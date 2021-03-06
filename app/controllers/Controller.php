<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\controllers;

use App\Twig\TwigLoader;

/**
 * Class Controller: verixons base controller
 *
 * @internal @verixon
 */

class Controller
{
  /**
   * Renders twig templates with content data
   * 
   * @param $view
   * @param array $content
   * 
   *
  */
  public function render($view , $content = []){
     $page = new TwigLoader;
     echo $page->render($view , $content);
  }

}