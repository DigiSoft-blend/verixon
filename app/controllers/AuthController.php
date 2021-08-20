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

    
     $UserTable = new UserTable;
     $uniqueUser = $UserTable->findOneBy(User::class, ['email'=> $email]);

    /** Test for unique user in database */ 
    if(empty($uniqueUser))
    {
      /** Test if form is submitted */
      if($request->isSubmitted())
      { 
        $request->startSession(); 
        $validation = new ImageValidation(); 
        $validated = $validation->validate($file_extension, '4m', 'profileImage');
         /** Test if image is valid file type */
        if($validated === 'File_Exist' || $validated === 'Invalid_File' || $validated === 'Max_Size_Exceeded'){
          $request->sessionSaveThis('error', $validated);
        }
        else{ 
          /** Upload image to cloudinary and saves user credentials in database */
           $cloudService = new Cloudinary();
           $cloudService->prepare();  
           $connection = $cloudService->send('profileImage', $file);

          if($connection === 'connection_error'){
            $request->sessionSaveThis('connectionError', 'Faild to connect to the internet: check your network connection !'); 
            $request->unlinkFile($file);
          }else{
            $user = $UserTable->insert(User::class); //user table insert using User::class entity
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setImgSecureUrl($cloudService->getSecureUrl());
            $user->setImgPublicID($cloudService->getPublicID());
            $UserTable->save($user);  
            $request->sessionSaveThis('alert0', 'Registration Successful !'); 
          }
        }

      }
    }else{
      $request->sessionSaveThis('alert1', 'The email you tried registring with already exist');
    } 
    
    $data = [
      'alert0' => $request->sessionGet('alert0'),
      'alert1' => $request->sessionGet('alert1'),
      'error'  => $request->sessionGet('error'),
      'connectionError'  => $request->sessionGet('connectionError'),
    ];

    $request->sessionReset();
   
    $this->render('register.html.twig', $data);
  }





  public function login(Request $request)
  {
    $email = $request->getPost('email');
    $password = $request->getPost('password');

    if($request->isSubmitted())
    { 
      $request->startSession();
      
      $UserTable = new UserTable;
      $user = $UserTable->findOneBy(User::class, ['email'=> $email]);

     if(!empty($user))
     {
        $originalPassword = '$2y$09$'. $user->getPassword();
        $email = $user->getEmail();

       if(hash::verifyThis($password, $originalPassword))
       {
         $request->sessionSaveThis('password', $password);
         $request->sessionSaveThis('originalPassword', $originalPassword);
         $request->sessionSaveThis('email',  $user->getEmail());

         $this->render('logged-in.html.twig', ['email' => $user->getEmail()] );

        }else{
         
         $request->sessionSaveThis('alert3', 'Invalid password');

         $notification = [
           'alert3' => $request->sessionGet('alert3')
         ];

         $this->render('login.html.twig', $notification );
        }

      }else{
        $request->sessionSaveThis('alert2', 'Invalid user, please kindly regiser to create your verixon account');
        
        $notification = [
          'alert2' => $request->sessionGet('alert2')
        ];
        
        $this->render('login.html.twig', $notification);
      }

    }else if($request->authCredentialsIsset())
    {   
      if($request->isAuthenticated()){
        $this->render('logged-in.html.twig', ['email' => $request->sessionGet('email')] );
      } 
    }
    else{
      redirect::url('/login');
    }  
  }

  
  public function logout(Request $request){
     $request->endSession();
     redirect::url('/');
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
