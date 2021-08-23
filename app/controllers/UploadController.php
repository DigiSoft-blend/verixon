<?php

namespace App\controllers;

  use App\http\Request;
  use App\http\Response;
  use App\Cloudinary\CloudService as Cloudinary;
  use Cloudinary\Transformation\Resize;
  use Cloudinary\Transformation\Effect;
  use App\Validate\ImageValidation;
  use App\hashing\Hash;
 
class UploadController extends Controller{

 public function uploadFile(Request $request)
 {
        $file_extension = [
         'png',
         'jpg',
         'jpeg'
        ];
      
     $file = $request->getFile('file');
     
     $request->startSession();
    
     if($request->isSubmitted())
     {  
        $validation = new ImageValidation(); 
        $validated = $validation->validate($file_extension, '4m', 'file');
        
        if($validated === 'file_exist' || $validated === 'invalid_file' || $validated === 'max_size_exceeded'){
          $request->sessionSaveThis('error', $validated);
        }else{ 
        
          $cloudService = new Cloudinary();
          $cloudService->prepare();  
          $connection = $cloudService->send('file', $file);

          $request->sessionSaveThis('secure_url', $cloudService->getSecureUrl());//fetches image seecure url
          $request->sessionSaveThis('public_id', $cloudService->getPublicID());//fetches image public id

          if($connection === 'connection_error'){
            $request->sessionSaveThis('connectionError', 'faild to connect to the internet: check your network connection !'); 
            $request->unlinkFile($file);//deletes the file from folder if theres a connection error 
          }else{
            //do database stuffs in here
          }
        }
     /** send multi data to user interface with array  */   
     $data = [
      'secure_url' => $request->sessionGet('secure_url'),
      'public_id' => $request->sessionGet('public_id'),
      'connection_error' => $request->sessionGet('connectionError'),
      'error' => $request->sessionGet('error')
     ];

    $this->render('fileUpload.html.twig', $data);

    }else{
      $this->render('fileUpload.html.twig');
    }
 }


 public function deleteFile(){
  $cloudService = new Cloudinary();
  $cloudConnect = $cloudService->prepare();
  $cloudService->deletFileWithID($file_name,'lgvaipjuff3nsiaowosz');
 }

}
