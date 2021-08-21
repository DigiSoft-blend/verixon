<?php

namespace App\controllers;

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

use App\http\Request;
use App\Model\UserTable;
use App\Entities\User;
use App\redirect\Redirect;
use App\hashing\Hash;
use App\Mailer\Mailer;
use App\Cloudinary\CloudService as Cloudinary;
use App\Validate\ImageValidation;

class AuthController extends Controller
{
  
  public function registerUser(Request $request)
  {

    $file_extension = [
      'png',
      'jpg',
      'jpeg'
    ];
    
    $email = $request->getPost('email');
    $password = $request->getPost('password');
    $file = $request->getFile('profileImage');

    
    if($request->isSubmitted())
    {  
      /** Test if form is submitted */
      $UserTable = new UserTable;
      $uniqueUser = $UserTable->findOneBy(User::class, ['email'=> $email]);
      
      /** Test for unique user in database */ 
      if(empty($uniqueUser))
      {
        $request->startSession(); 
        $validation = new ImageValidation(); 
        $validated = $validation->validate($file_extension, '4m', 'profileImage');
        /** Test if image is valid file type */
        if($validated === 'File_Exist' || $validated === 'Invalid_File' || $validated === 'Max_Size_Exceeded'){
          $data = ['error' => $validated ];
          $this->render('register.html.twig', $data);
        }
        else{ 
          /** Upload image to cloudinary and saves user credentials in database */
          $cloudService = new Cloudinary();
          $cloudService->prepare();  
          $connection = $cloudService->send('profileImage', $file);

          if($connection === 'connection_error'){
            $request->unlinkFile($file);
            $data = ['connectionError' => 'Connection error. Check your network settings !' ];
            $this->render('no-network.html.twig', $data);
          }else{
            $user = $UserTable->insert(User::class); //user table insert using User::class entity
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setImgSecureUrl($cloudService->getSecureUrl());
            $user->setImgPublicID($cloudService->getPublicID());
            $UserTable->save($user);   
            $data = ['alert0' => 'Registration Successful !'];
            $this->render('register.html.twig', $data);
          }
        }
      }else{  
        $data = ['alert1' => 'The email you tried registring with already exist'];
        $this->render('register.html.twig', $data);
      } 
    }else{
      $this->render('register.html.twig');
      $request->sessionReset();
    }  
    
  }



  public function login(Request $request)
  {
    $email = $request->getPost('email');
    $password = $request->getPost('password');

    $request->startSession();

    if($request->isSubmitted())
    { 
      $UserTable = new UserTable;
      $user = $UserTable->findOneBy(User::class, ['email'=> $email]);


          $request->sessionSaveThis('password', $password);
          $request->sessionSaveThis('email', $email );

     if(!empty($user))
     {
        $originalPassword = '$2y$09$'. $user->getPassword();
        $email = $user->getEmail();

         $request->sessionSaveThis('originalPassword', $originalPassword);

        if($request->authenticated($password, $originalPassword))
        {
          $this->render('logged-in.html.twig', ['email' => $user->getEmail()] );
        }else{
          $notification = ['alert3' => 'Invalid password'];
          $this->render('login.html.twig', $notification );
        }

      }else{
        $notification = [ 'alert2' => 'Invalid user, please kindly regiser to create your verixon account' ];
        $this->render('login.html.twig', $notification);
      }
    
    }elseif($request->authActive('password','originalPassword')) //requires session keys for password and hash
    {   
        $this->render('logged-in.html.twig', ['email' => $request->sessionGet('email')] );
    }
     else{
      $this->render('login.html.twig');
     }  

  }

  
  public function logout(Request $request){
     $request->endSession();
     Redirect::url('/');
  }




/** Deletes file from cloudinary  */
  public function deleteUser(Request $request) // working
  { 
    $request->startSession();
    $userTable = new UserTable;
    $user = $userTable->findOneBy(User::class, ['email' => $request->sessionGet('email')] );
    $userTable->delete($user);
    $request->endSession();
    Redirect::url('/register');
  }

  
}
