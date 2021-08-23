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

/**
 * Class Mailer: verixons driver for sending emails
 *
 * @internal @verixon
*/ 
class Mailer{
  /**
     * @var object $mailer instance
  */     
  private $mailer;
  /**
     * @var string $message
  */
  private $message;
  /**
     * @var array $mail
  */
  private $mail;
  /**
     * @var string $connectionErrorMessage;
  */
  private $connectionErrorMessage;
  /**
     * @var bool $statusSuccess
  */
  private $statusSuccess = false;
  /**
     * @var bool $statusFailure
  */
  private $statusFailure = false;
  /**
     * @var mixed $error
  */
  private $error;
   /**
     * @var string $warning
  */
  private $warning;

/**
 * prepares swift mailer transport for sending a mail
 * 
 * @return object mailer object && message object
 *
*/
 public function prepare()
 {
  $mail = include './config/mail.php';
  $this->mail = $mail;

  $transport = (new Swift_SmtpTransport( $mail->smtp['host'], $mail->smtp['port'], $mail->smtp['encryption']))
  ->setUsername($mail->smtp['username'])
  ->setPassword($mail->smtp['password']);

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);
  $this->mailer = $mailer;
    
  // Create a message
  $message = (new Swift_Message('Wonderful Verixon Subject')); // add a valid subject
  $this->message = $message;
 }
 
/**
   * sets mail senders address to verixon, that is email from verixon
   * 
   * @return mixed 
   *
  */
 public function from_verixon()
 {
    $this->message->setFrom([$this->mail->from['address'] => $this->mail->from['name']]);
 }
 /**
   * sets email from sender with name
   * 
   * @param string $sender
   * @param string $name
   * 
   * @return string message from sender
   *
  */
 public function from($sender, $name)
 {
    $this->message->setFrom([ $sender => $name]);
 }

/**
   * sets email from sender with name
   * 
   * @param string $file
   * 
   * @return mixed 
   *
  */
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
 /**
   * sets the content of the email
   * 
   * @param string $content
   * 
   * @return mixed 
   *
  */
 public function body($content)
 {                            
   $this->message->setBody($content);
 }
  /**
   * sets the contentType of the email
   * 
   * @param string $type 
   * 
   * @return mixed mail message content type
   *
  */
 public function contentType($type)
 {
   $this->message->setContentType($type);
 }
/**
 * attaches files to a mail
 * 
 * @param string $file
 * 
 * @return string file path
 *
*/
 public function attachFile($file)
 {
  $this->message->attach(Swift_Attachment::fromPath(FILE_PATH.$file));
 } 
/**
 * sends a mail
 * 
 * @param string $content
 * 
 * @return bool
 *
*/
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
/**
 * sets the content of the email
 *  
 * @return array $status
 *
*/
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