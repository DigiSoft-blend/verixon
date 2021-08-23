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

/**
 * Class Request: get, post, server, cookies, verixons Request class
 *
 * @internal @verixon
*/  
class Request{

  /**
     * @var bool $submited
  */
  public  $submited = false;
  /**
     * @var object $request: SymfRequest instance
  */
  private $request;
  /**
     * @var mixed $target_file
  */
  private $target_file;
   
   /**
     * request class constructor
     * 
     * @return object : $request
     *
   */
  public function __construct(){
    $this->request = SymfRequest::createFromGlobals();
  }

/**
   * gets files from form input of type= file
   * 
   * @param string $file
   * 
   * @return mixed 
   *
  */
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
     } 
   }
 }
 /**
   * returns target file 
   * 
   * @return mixed $target_file
   *
  */
  public function getTargetFile(){
     return $this->target_file;
  }
  /**
   * deletes a target file from verixons storage directory
   * 
   * @param string $target_file
   * 
  */
  public function unlinkFile($target_file){
    unlink($target_file);
  }

  /**
   * verixons get request:@httpfoundation supperglobals: get
   * 
   * @param string $parameterName
   * @param mixed $defaultValue
   * 
   * @return mixed $request @ get 
   *
  */
  public  function get($parameterName , $defaultValue = null){
      return  $this->request->query->get($parameterName, $defaultValue);
  }
  /**
   * 
   * @return mixed $request @gets url parameters: verixons wildcard
   *
  */
  public function getUrlParameters(){
   return $this->request->query->get('params', Route::getUriParams());
  }
  /**
   * verixons server request:@httpfoundation supperglobals: server
   * 
   * @param mixed $variables
   * 
   * @return mixed $request server httpfoundation supperglobal
   *
  */
  public function getServerVariable($variable){
    $this->request->server->get($variable);
  }
  /**
   * verixons files request:@httpfoundation supperglobals: files
   * 
   * @param mixed $id
   * 
   * @return mixed $request file httpfoundation supperglobal
   *
  */
  public function getFileInstance($id){
    $this->request->files->get($id);
  }
  /**
   * verixons cookies request:@httpfoundation supperglobals: cookies
   * 
   * @param mixed $value
   * 
   * @return mixed $request cookies httpfoundation supperglobal
   *
  */
  public function getCookeiValue($value){
    $this->request->cookies->get($value);
  }
  /**
   * verixons header request:@httpfoundation supperglobals: header
   * 
   * @param mixed $key
   * 
   * @return mixed $request header httpfoundation supperglobal
   *
  */
  public function getRequestHeader($key){
    $this->request->headers->get($key);
  }
  /**
   * verixons  request_uri :@httpfoundation supperglobals: request_uri
   * 
   * @return string $request url httpfoundation
   *
  */
  public function getRequestUri(){
    return  $this->request->server->get('REQUEST_URI');
  }
  /**
   * verixons getPost: gets form post
   * 
   * @param array $data
   * 
   * @return mixed $request POST
   *
  */
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
  /**
   * checks for a form submition
   * 
   * @return bool $submited: true or false
   *
  */
  public  function isSubmitted(){
    return $this->submited;
  } 
  /**
   * starts a session
   *
  */
  public function startSession(){
    session_start();
  }
   /**
   * saves a key value pair in session storage
   * 
   * @param string $key
   * @param mixed $value
   * 
   * @return array session supperglobal
   *
  */
  public function sessionSaveThis( $key , $value ){
    $_SESSION[$key] = $value;
  }
   /**
   * gets a stored variable from the session storage with variable key
   * 
   * @param string $key
   * 
   * @return array session stored variables:data
  */
  public function sessionGet($key){
    if(isset($key)){
      if(array_key_exists($key, $_SESSION)){
        return $_SESSION[$key];
      }
    }
  }
  /**
   * authenticates a user with password and hashed password
   * 
   * @param string $password
   * @param mixed $originalPassword
   * 
   * @return bool true || false
   *
  */
  public function authenticated($password, $originalPassword){
    if(hash::verifyThis($password, $originalPassword)){
      return true;
    }else{
      return false;
    }
  }

  /**
   * authenticates an active user 
   * 
   * @param string $password
   * @param mixed $originalPassword
   * 
   * @return bool true || false
   *
  */
  public function authActive($password, $originalPassword ){
    if(isset($password) && isset($originalPassword)){
      if(array_key_exists($password, $_SESSION) &&  array_key_exists($originalPassword , $_SESSION)){
        $pass = $_SESSION[$password];
        $originalPass = $_SESSION[$originalPassword];
        if(hash::verifyThis($pass, $originalPass)){
          return true;
        }else{
          return false;
        } 
      }else{
        return false;
      }
    }else{
      return false;
    }  
  }

 /**
   * resets a session
   * 
  */
  public function sessionReset(){
    session_reset();
  }
  
 /**
   * destroys a session
   *
  */
  public function endSession(){
    session_start();
    session_destroy();
  }

}