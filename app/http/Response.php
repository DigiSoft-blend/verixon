<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\http;

use Symfony\Component\HttpFoundation\Response as SymfResponse;

class Response{

  private $response;

  public function __construct(){
    $this->response = new SymfResponse();
  } 

  public function ResponseSetContent($content){
      $this->response->setContent($content);
  }

  public function setStatusCode($status){
      $this->response->setStatusCode(SymfResponse::$status);
  }

  public function httpResponseHeader($contentTypeAttribute, $contentType){
      $this->response->headers->set($contentTypeAttribute, $contentType);
  }

  public function sendResponse(){
      $this->response->send();
  }

   public function render_response($content){
    $this->response->ResponseSetContent($content);
    $this->response->httpResponseHeader('Content-Type', 'text/html');
    $this->response->sendResponse();
  }

   
}