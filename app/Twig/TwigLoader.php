<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\Twig;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;

/**
 * Class TwigLoader: verixons Twig driver class
 *
 * @internal @verixon
*/ 
class TwigLoader
{   
    /**
     * @var object Twig_Environment instance
    */ 
    private $twig;
     
   /**
   * TwigLoader constructor
   * 
   * @return object : Twig_Environment instance
   */
    public function __construct(){
        $loader = new Twig_Loader_Filesystem(TEMPLATE_PATH);
        $twig = new Twig_Environment($loader, ['debug' => true],['cache' => '/templates/cache']);
        $twig->addExtension(new Twig_Extension_Debug());
        $this->twig = $twig;
    }
   /**
   * renders web view 
   * 
   * @param string $view
   * @param array|mixed $content
   * 
   * @return /view 
   *
   */
    public function render( $view , $content = []){
        echo $this->twig->render($view, $content);
    }
   /**
   * renders views as blocks
   * 
   * @param string $view
   * @param mixed $id
   * @param array|mixed $content
   * 
   * @return /view 
   *
   */ 
    public function renderBlock($view, $id ,$content = []){
        $template = $this->twig->load($view);
        return $template->renderBlock($id, $content);
    }
}

/**
 * everytime i learn a new thing, something hunts me in constant, that i dont know a lot more.
 * so, what next ?
 * i dont know
 */


