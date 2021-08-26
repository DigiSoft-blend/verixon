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
   * @return TwigLoader page instance
   *
  */
  public function render($view , $content = []){
    // $page = new TwigLoader;
    // return $page->render($view , $content);
    echo "in base controller";
  }

}