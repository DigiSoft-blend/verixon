<?php

namespace App\Validate;

/**
 * Class ImageValidation: verixons ImageValidation class
 * 
 * @author Silas Udofia
 *
 * @internal @verixon
*/ 
class ImageValidation extends Validation{

   /**
   * routes url to verixons controller with defined method
   * 
   * @param array $file_extension
   * @param array $fileSize
   * @param string $file
   * 
   * @return string : ok | Invalid_File | Max_Size_Exceeded
   *
  */
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
