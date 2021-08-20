<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\http;

use App\redirect\redirect;
use App\router\Route;
use App\hashing\Hash;
use Symfony\Component\HttpFoundation\Request as SymfRequest;


class Request{

  public  $submited = false;
  private $request;
  private $uploaded;
  private $file_extension;
  private $valid;
  private $file_size;
  private $validFileSize;
  private $maxSize;
  private $isValid;
  private $target_file;

  public function __construct(){
    $this->request = SymfRequest::createFromGlobals();
  }


  public function getFile($file)
  {
   if($this->request->server->get('REQUEST_METHOD') === "POST"){
     $onSubmited = $this->request->request->get('submit');
     if(isset($onSubmited)){
        if(isset($_FILES[$file]["name"])){  
          $target_file = FILE_PATH . basename($_FILES[$file]["name"]);
          $this->target_file = $target_file;
          $this->submited = true;
          return  $target_file;
        }else{
          echo 'file not set';
          $this->submited = false;
        }
     }exit; 
   }exit;
 }

  public function getTargetFile(){
     return $this->target_file;
  }

  public function unlinkFile($target_file){
    unlink($target_file);
  }



  public  function get($parameterName , $defaultValue = null){
      return  $this->request->query->get($parameterName, $defaultValue);
  }

  public function getUrlParameters(){
   return $this->request->query->get('params', Route::getUriParams());
  }

  public function getServerVariable($variable){
    $this->request->server->get($variable);
  }

  public function getFileInstance($id){
    $this->request->files->get($id);
  }

  public function getCookeiValue($value){
    $this->request->cookies->get($value);
  }

  public function getRequestHeader($key){
    $this->request->headers->get($key);
  }

  public function getRequestUri(){
    return  $this->request->server->get('REQUEST_URI');
  }

  public function getPost( $data = [] ){
     if($this->request->server->get('REQUEST_METHOD') === "POST"){
        $onSubmited = $this->request->request->get('submit');
       if(isset($onSubmited)){
           if(empty($this->request->request->get($data))){
               $this->submited = false;
           }if(!empty($this->request->request->get($data))){
              $post =  $this->request->request->get($data);
              $this->submited = true;
              return $post;
           }
       }
     }
  }

  public  function isSubmitted(){
    return $this->submited;
  } 

  public function startSession(){
    session_start();
  }

  public function sessionSaveThis( $key , $value ){
    $_SESSION[$key] = $value;
  }

  public function sessionGet($key){
    if(isset($key)){
      if(array_key_exists($key, $_SESSION)){
        return $_SESSION[$key];
      }
    }
  }

  public function authCredentialsIsset(){
    if(isset($_SESSION['password']) && isset($_SESSION['originalPassword'])){
      return true;
    }else{
      return false;
    }
  }


  public function isAuthenticated(){
    if(hash::verifyThis($_SESSION['password'], $_SESSION['originalPassword'])){
      return true;
    }else{
      return false;
    } 
  }


  public function sessionReset(){
    session_reset();
  }
  

  public function endSession(){
    session_start();
    session_destroy();
  }

 
 
   
}