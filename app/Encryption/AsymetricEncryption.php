<?php

namespace App\Encryption;


class AsymetricEncryption{

   private $message;
   private $sealed_data;
   private $envelope;

     
   public function encrypt($data , $public_key)
   {
      $public_key = openssl_get_publickey(file_get_contents($public_key));
      
      $encrypted = $e = NULL;
      openssl_seal($data, $encrypted, $e, array($public_key));

      $this->sealed_data =  $sealed_data = base64_encode($encrypted);
      $this->envelope =  $envelope = base64_encode($e[0]);

      $secret = [
         'encrypted' =>  $this->sealed_data,
         'envelop' => $this->envelope 
      ];

      return  $secret;
   }


   public function decrypt($private_key, $sealed_data, $envelope)
   {
      $private_key = openssl_get_privatekey(file_get_contents($private_key));
      $input = base64_decode($sealed_data);
      $einput = base64_decode($envelope);
      $plaintext = NULL;
      openssl_open($input, $plaintext, $einput, $private_key);
      return $plaintext;
   } 


}