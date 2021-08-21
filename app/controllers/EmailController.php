<?php

namespace App\controllers;

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

use App\http\Request;
use App\Mailer\Mailer;
use App\Validate\ImageValidation;

class EmailController extends Controller
{
  
    /** -----------------------------------------
    *       STATUS KAY FOR MAIL EXCEPTIONS
    * -----------------------------------------
    *     KEY            |      functions 
    * -----------------------------------------
    * 'message' => $this->connectionErrorMessage
    * 'transport_success' => $this->statusSuccess,
    * 'transport_failure' => $this->statusFailure,
    * 'validation_error' => $this->error,
    * 'validation_warnings'=>$this->warning
   */


  public function Email(Request $request)
  {

    $file_extension = [
      'png',
      'jpg',
      'jpeg'
     ];
    
    $gmail = new Mailer;
    $name = $request->getPost('recipientName');
    $recipient = $request->getPost('toAddress');
    $body = $request->getPost('body');
    $attachment = $request->getFile('attachment');

    $request->startSession();

   if($request->isSubmitted())
   {
      $validation = new ImageValidation(); 
      $validated = $validation->validate($file_extension, '4m', 'attachment');
      /** Test if image is valid file type */
      if($validated === 'File_Exist' || $validated === 'Invalid_File' || $validated === 'Max_Size_Exceeded'){
        //$request->sessionSaveThis('error', $validated);
        $data = [ 'error' => $validated ];
        $this->render('mail.html.twig', $data);
      }
      else{  
        $gmail->prepare();
        $gmail->from_Verixon();//from address @ .env 
        $gmail->to($recipient, $name);
        $gmail->body($body);
        $gmail->attachFile($attachment);
        $gmail->contentType('text/html');
        $gmail->send();

        $connection = $gmail->getStatus();

        if($connection['transport_failure'] === true){
          
           $request->sessionSaveThis('connectionError', 'Connection error. Check your network connection !');

          $data = [
            'connectionErrorMessage' => $connection['message']
          ];
         
          $this->render('no-network.html.twig', $data);
          exit;

        }else{
          $request->sessionSaveThis('messageSentAlert', 'Mail has been sent to '. $recipient);
          echo 'ok';
        }
     }

   }else{   
    $notification = [
      'messageSentAlert' => $request->sessionGet('messageSentAlert'),
    ];

    $this->render('mail.html.twig', $notification);
    $request->sessionReset();
   }

  }

  
}
