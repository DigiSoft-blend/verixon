<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\controllers;

use App\Twig\TwigLoader;

class Controller{

  public function render($view , $content = []){
    $page = new TwigLoader;
    return $page->render($view , $content);
  }

}