<?php

namespace App\Mailer;

use  Swift_SmtpTransport;
use  Swift_Mailer;
use  Swift_Message;
use  Swift_Attachment;
use  Egulias\EmailValidator\EmailValidator;
use  Egulias\EmailValidator\Validation\DNSCheckValidation;
use  Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use  Egulias\EmailValidator\Validation\RFCValidation;
use  App\EnvLoader\Env;


class Mailer{
       
  private $mailer;
  private $message;
  private $mail;
  private $connectionErrorMessage;
  private $statusSuccess = false;
  private $statusFailure = false;
  private $error;
  private $warning;

 public function prepare(){
 
  $mail = include './config/mail.php';

  $this->mail = $mail;

    $transport = (new Swift_SmtpTransport( $mail->smtp['host'], $mail->smtp['port'], $mail->smtp['encryption']))
    ->setUsername($mail->smtp['username'])
    ->setPassword($mail->smtp['password']);

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    $this->mailer = $mailer;
      
    // Create a message
    $message = (new Swift_Message('Wonderful Subject')); // add a valid subject
    $this->message = $message;
    
 }
 

 public function from_Verixon()
 {
    $this->message->setFrom([$this->mail->from['address'] => $this->mail->from['name']]);
 }

 public function from($sender, $name)
 {
    $this->message->setFrom([ $sender => $name]);
 }

 public function to($recipient, $name)
 {
    $validator = new EmailValidator();
    $multipleValidation = new MultipleValidationWithAnd([
       new RFCValidation(),
       new DNSCheckValidation()
    ]);
    
    $emailIsValid = $validator->isValid($recipient, $multipleValidation); 

    if($emailIsValid)
    {
      $this->message->setTo([$recipient => $name]);   
      $this->message->setCc([$recipient => $name]);   
      $this->message->setBcc([$recipient => $name]);
    }else{
      $this->error = $validator->getError();
      $this->warning = $validator->getWarnings();
    }
 }

 public function body($content)
 {                            
   $this->message->setBody($content);
 }

 public function contentType($type)
 {
   $this->message->setContentType($type);
 }

 public function attachFile($file)
 {
  $this->message->attach(Swift_Attachment::fromPath(FILE_PATH.$file));
 } 

 public function send()
 {
   try{
    $result = $this->mailer->send($this->message);
      $this->statusSuccess = true;
      $this->statusFailure = false;
    }catch(\Swift_TransportException $e)
    {
    $this->connectionErrorMessage = $connectionErrorMessage = 'Check your network settings. '.$e->getMessage();
      $this->statusFailure = true;
      $this->statusSuccess = false;
    }
 }

 
 public function getStatus(){
  return $status = [
    'message' => $this->connectionErrorMessage,
    'transport_success' => $this->statusSuccess,
    'transport_failure' => $this->statusFailure,
    'validation_error' => $this->error,
    'validation_warnings'=>$this->warning
  ];
 }

}