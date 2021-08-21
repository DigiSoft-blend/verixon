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

class TwigLoader
{   
     
    private $twig;

    public function __construct(){
        $loader = new Twig_Loader_Filesystem(TEMPLATE_PATH);
        $twig = new Twig_Environment($loader, ['debug' => true],['cache' => '/templates/cache']);
        $twig->addExtension(new Twig_Extension_Debug());
        $this->twig = $twig;
    }

    public function render( $view , $content = []){
        echo $this->twig->render($view, $content);
    }

    public function renderBlock($view, $id ,$content = []){
        $template = $this->twig->load($view);
        return $template->renderBlock($id, $content);
    }
   
   

}
