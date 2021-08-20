<?php 

namespace App\filehandler;

use App\redirect\redirect;

class file{
    
  private  $filename;
  private  $filedirectory;
  private  $filesize;
  private  $content;

 public function __construct(){
    $filename = " ";
    $filedirectory = " ";
    $filesize = 0;
    $content = " ";
  }
 
 /* APP SPECIFIC */ 
  public function create_controller($filename){
    if(file_exists($filename)){
      return false;
    }
    else{
      $file = fopen( CONTROLLER_PATH . $filename, "x") or die(redirect::url('getsrtd')); 
      fclose($file);
      return true;
    }
  }

  public function create_table($filename){
    if(file_exists($filename)){
      return false;
    }
    else{
      $file = fopen( MIGRATIONS_PATH . $filename, "x") or die(redirect::url('getsrtd')); 
      fclose($file);
      return true;
    }
  }

  public function create_view($filename){
    if(file_exists($filename)){
      return false;
    }
    else{
      $file = fopen( VIEW_PATH . $filename, "x") or die(redirect::url('getsrtd')); 
      fclose($file);
      return true;
    }
  }

 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function write( $filename , $content){
      
      $this->$content = $content;
      $this->$filename = $filename;

        if(!file_exists($this->$filename)){
            return "File ".$this->$filename. " does not exist" ;
        }else{
          $file = fopen($this->$filename, "a") or die("Unable to open ".$this->filename);
          fwrite($file, $this->$content."\n");
          fclose($file);
          return 'Data written to '.$this->$filename." Status: 200 OK".'<br>';
        }
  }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function read($filename){

    $this->$filename = $filename;

    if(!file_exists($this->$filename)){
      return "File ".$this->$filename. " does not exist" ;
    }else{
      $file = fopen($this->$filename, "r") or die("Unable to open ".$this->$filename);
      $fileContent = fread($file,filesize($this->$filename));
      return $fileContent;
      fclose($file);
    }
  }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function getFilesize($filename){
     $this->$filename = $filename;
     if(!file_exists($this->$filename)){
      die("File ".$this->$filename. " does not exist");
     }else{
      return filesize($this->$filename);
     }
  }
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////       
}

?>