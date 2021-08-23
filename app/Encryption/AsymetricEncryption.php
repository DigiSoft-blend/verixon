<?php

namespace App\Encryption;

/**
 * Class AsymetricEncryption: encrypts decrypts messages
 *
 * @internal @verixon
*/
class AsymetricEncryption{

   /**
     * @var string $message
   */
   private $message;
   /**
     * @var string $sealed_data
   */
   private $sealed_data;
   /**
     * @var string $envelope
   */
   private $envelope;

   /**
     * Encrypts a message
     * 
     * @param $data 
     * @param $public_key
     * 
     * @return  array : encrypted message with envelope
     *
   */

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

  /**
     * Encrypts a message
     * 
     * @param $private_key
     * @param $sealed_data
     * @param $envelope
     * 
     * @return string: plain text of decrypted message with envelope
     *
   */
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