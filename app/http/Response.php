<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\http;

use Symfony\Component\HttpFoundation\Response as SymfResponse;

/**
 * Class Response
 *
 * @internal @verixon
*/  
class Response{
  
  /**
     * @var object $response: SymfResponse instance
  */
  private $response;
  /**
   * Response class constructor
   * 
   * @return object : $response
   *
  */
  public function __construct(){
    $this->response = new SymfResponse();
  } 
  /**
    * sets the content of the response 
    *
    * @param mixed $content
    * 
    * @return mixed : $response content
    *
  */
  public function ResponseSetContent($content){
      $this->response->setContent($content);
  }
  /**
    * sets the status code of the response 
    *
    * @param mixed $status
    * 
    * @return mixed : $response status code
    *
  */
  public function setStatusCode($status){
      $this->response->setStatusCode(SymfResponse::$status);
  }
  /**
    * sets the status code of the response 
    *
    * @param mixed $status
    * 
    * @return mixed : $response status code
    *
  */
  public function httpResponseHeader($contentTypeAttribute, $contentType){
      $this->response->headers->set($contentTypeAttribute, $contentType);
  }
  /**
    * sends the response 
    *
    * @return mixed : $respons
    *
  */
  public function sendResponse(){
      $this->response->send();
  }
  /**
    * renders the response
    *
    * @param mixed $content
    * 
    * @return mixed : $text/html response
    *
  */
   public function render_response($content){
    $this->response->ResponseSetContent($content);
    $this->response->httpResponseHeader('Content-Type', 'text/html');
    $this->response->sendResponse();
  }   
}