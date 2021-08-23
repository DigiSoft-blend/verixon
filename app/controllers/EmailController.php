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
    /** gets email credentials from form input */
    $name = $request->getPost('recipientName');
    $recipient = $request->getPost('toAddress');
    $body = $request->getPost('body');
    $attachment = $request->getFile('attachment');

    $request->startSession();//starts a session
   
   if($request->isSubmitted())
   {  
     /** set valid file extentions */
      $file_extension = [
          'jpeg',
          'png'
      ];

      $validation = new ImageValidation(); //creates image validation object to validate images/files
      $validated = $validation->validate($file_extension, '4m', 'attachment');
      /** Test if image is valid file type */
      if($validated === 'File_Exist' || $validated === 'Invalid_File' || $validated === 'Max_Size_Exceeded'){
        $data = [ 'error' => $validated ];
        $this->render('mail.html.twig', $data);
      }
      else{  
        $gmail = new Mailer; //creates a mailer object for sending emails
        $gmail->prepare();//prepares mail transport returns a message object
        $gmail->from_verixon();//from address @ .env 
        $gmail->to($recipient, $name);//to recipient with name
        $gmail->body($body);//body/content of message
        $gmail->attachFile($attachment);//adds an attachment example: an image.
        $gmail->contentType('text/html');//sets the content type
        $gmail->send();//sends the mail.

        $connection = $gmail->getStatus();//gets the status of message sent or not

        if($connection['transport_failure'] === true){
          $data = [ 'connectionErrorMessage' => $connection['message'] ];
          $this->render('no-network.html.twig', $data);
          exit;
        }else{
          $request->sessionSaveThis('messageSentAlert', 'Mail has been sent to '. $recipient);
        }
     }

   }else{   
    $this->render('mail.html.twig');
    $request->sessionReset();
   }

  }

  
}
