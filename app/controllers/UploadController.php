<?php

namespace App\controllers;

  use App\http\Request;
  use App\http\Response;
  use App\Cloudinary\CloudService as Cloudinary;
  use Cloudinary\Transformation\Resize;
  use Cloudinary\Transformation\Effect;
  use App\Validate\ImageValidation;
 
class UploadController extends Controller{

 public function uploadFile(Request $request)
 {
        $file_extension = [
         'png',
         'jpg',
         'jpeg'
        ];

     $file = $request->getFile('file');
     
     if($request->isSubmitted())
     {  
        $request->startSession(); 
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
        }   

     $data = [
      'secure_url' => $request->sessionGet('secure_url'),
      'public_id' => $request->sessionGet('public_id'),
      'connection_error' => $request->sessionGet('connectionError'),
      'error' => $request->sessionGet('error')
     ];

    $request->sessionReset();
    $this->render('fileUpload.html.twig', $data);
 }


 public function deleteFile(){
  $cloudService = new Cloudinary();
  $cloudConnect = $cloudService->prepare();
  $cloudService->deletFileWithID($file_name,'lgvaipjuff3nsiaowosz');
 }

}
