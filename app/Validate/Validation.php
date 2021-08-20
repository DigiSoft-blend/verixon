<?php

namespace App\Validate;

use App\http\Request;
 
class Validation{

   
    public function isValidFile($uploaded_file_extension, $file)
    {
      $file_extension = pathinfo($_FILES[$file]["name"],PATHINFO_EXTENSION);
      
      if(in_array($file_extension, $uploaded_file_extension)){
        return true;
      }else{
        return false;
      }
    }
  
  
    public function fileExceedsMaxSize($maxsize, $file)
    {
      $fileSize = $this->parseFilesize($maxsize);
      $file_size = $_FILES[$file]["size"];

      if($file_size > $fileSize){
        return false;
      }else{
        return true;
      }
    }
  

  
    public function getFileStatus(){
      return $status = [
        'is_valid' => $this->isValid,
        'max_size_exceeded' => $this->maxSize,
      ];
     }
  
  
    public function parseFilesize($size){
     
      if ('' === $size) {
        return 0;
      }
  
    $size = strtolower($size);
  
    $max = ltrim($size, '+');
    if (0 === strpos($max, '0x')) {
        $max = \intval($max, 16);
    } elseif (0 === strpos($max, '0')) {
        $max = \intval($max, 8);
    } else {
        $max = (int) $max;
    }
  
    switch (substr($size, -1)) {
        case 't': $max *= 1024;
        // no break
        case 'g': $max *= 1024;
        // no break
        case 'm': $max *= 1024;
        // no break
        case 'k': $max *= 1024;
    }
     return $max;
    }
  
   
   private function getFileError($file){
      if($_FILES[$file]['error'] > 0){
        switch($_FILES[$file]['error'])
        {
          case 1: echo 'File exceeded upload_max_filesize'; break;
          case 2: echo 'File exceeded max_file_size'; break;
          case 3: echo 'File only partially uploaded'; break;
          case 2: echo 'No file uploaded'; break;
        }
        exit;
      }
   } 

}  
