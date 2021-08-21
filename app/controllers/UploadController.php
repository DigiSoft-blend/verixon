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
     
     $token = $request->getPost('token');   
     $file = $request->getFile('file');
     
     $request->startSession();

     $request->sessionSaveThis('token',  $token );
     var_dump($request->sessionGet('token'));

     if($request->isSubmitted())// && hash::verifyThis('/file', $token))
     {  
        $validation = new ImageValidation(); 
        $validated = $validation->validate($file_extension, '4m', 'file');
        
        if($validated === 'file_exist' || $validated === 'invalid_file' || $validated === 'max_size_exceeded'){
        
          $request->sessionSaveThis('error', $validated);

        }else{ 
           $cloudService = new Cloudinary();

           $cloudService->prepare();  
           $connection = $cloudService->send('file', $file);

           $request->sessionSaveThis('secure_url', $cloudService->getSecureUrl());
           $request->sessionSaveThis('public_id', $cloudService->getPublicID());

            if($connection === 'connection_error'){
              $request->sessionSaveThis('connectionError', 'faild to connect to the internet: check your network connection !'); 
              $request->unlinkFile($file);
            }else{
               //do database stoff in here
            }
          }
          

     $data = [
      'secure_url' => $request->sessionGet('secure_url'),
      'public_id' => $request->sessionGet('public_id'),
      'connection_error' => $request->sessionGet('connectionError'),
      'error' => $request->sessionGet('error')
     ];


     $this->render('fileUpload.html.twig', $data);
    }else{
      echo 'session expired';
    }
 }


 public function deleteFile(){
  $cloudService = new Cloudinary();
  $cloudConnect = $cloudService->prepare();
  $cloudService->deletFileWithID($file_name,'lgvaipjuff3nsiaowosz');
 }

}
