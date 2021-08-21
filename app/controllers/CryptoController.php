<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

namespace App\controllers;

use App\hashing\Hash;
use App\Encryption\SymetricEncryption;
use App\Encryption\AsymetricEncryption;
use App\Entities\MessageEncryption;
use App\Model\Model;
use App\Http\Request;
use App\redirect\Redirect;


class CryptoController extends controller{

  public function keyGenerate()
  {
    //returns a random key of length 20
    return $crypto->keyGenerate(20);
  }

  public function AsymetriceEncryptMessage(Request $request)
  { 
    //every user that registers is given a unique key
    $message = $request->getPost('message');
    
    $file_extension = [
      'pem'
     ];


    $model = new Model;
    $encryptedM = $model->all(MessageEncryption::class);

    if($request->isSubmitted())
     { 
      $asymcrypt = new AsymetricEncryption;
      $arrayEncrypto = $asymcrypt->encrypt( $message , 'keys/public.pem');
      $envelop = $arrayEncrypto['envelop'];
      $encryptedData = $arrayEncrypto['encrypted'];
     
      $model = new Model;
      $entity = $model->insert(MessageEncryption::class);
      $entity->setEnvelop($envelop);
      $entity->setEncryptedMessage($encryptedData);
      $model->save($entity);

      $encryptedM = $model->all(MessageEncryption::class);
      $data = ['encryptedMessage' => $encryptedM ];
      $this->render('message.html', $data);

    }else{
      $data = ['encryptedMessage' => $encryptedM ];
      $this->render('message.html', $data);
    }
  }


  public function AsymetriceDecryptMessage(Request $request)
  {

    $encryptedData = $request->getPost('encryptedmessage');
    $envelop = $request->getPost('envelop');

    if($request->isSubmitted())
    { 
      $asymcrypt = new AsymetricEncryption;
      $plaintext = $asymcrypt->decrypt('keys/private.key', $encryptedData,  $envelop );
     
      $model = new Model;
      $encryptedM = $model->all(MessageEncryption::class);
      $data = ['encryptedMessage' => $encryptedM , 'plaintext' =>  $plaintext];
      $this->render('message.html', $data);
    }else{
      Redirect::url('/');
    }
  }
  
}