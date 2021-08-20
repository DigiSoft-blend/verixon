<?php

namespace App\Validate;


class ImageValidation extends Validation{

    public function validate($file_extension = [] , $fileSize = [], $file)
    {
     
    if($this->fileExceedsMaxSize($fileSize, $file)){
        if($this->isValidFile($file_extension, $file)){ 
          return 'ok';
        }else{
          return 'Invalid_File';
        }
    }else{ 
        return 'Max_Size_Exceeded';
    } 
  }
}
