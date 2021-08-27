<?php

namespace App\controllers;

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

use App\http\Request;
use App\Model\Model;
use App\Entities\User;
use App\redirect\Redirect;
use App\hashing\Hash;

/**
 * Class AuthController: performs user authentications
 *
 * @internal
 */
class AuthController extends Controller
{
  /**
   * Endpoint for user registrations
   * 
   * @param Request $request
   * @returns user registration form twig template/page
   *
  */
  public function registerUser(Request $request)
  {
    /** get the form data */  
    $email = $request->getPost('email');
    $password = $request->getPost('password');
    
     /** Test if form is submitted */
    if($request->isSubmitted())
    {  
      /** create a model object to fetch data from database */
      $UserTable = new Model;
      $uniqueUser = $UserTable->findOneBy(User::class, ['email'=> $email]);
      
      /** Test for unique user in database */ 
      if(empty($uniqueUser))
      {

        $user = $UserTable->insert(User::class); //insert data to database using User::class entity
        $user->setEmail($email);//set user email
        $user->setPassword($password);//set user password
        $UserTable->save($user);//save user password   
        /** renders registration page with alert*/
        $data = ['alert0' => 'Registration Successful !'];
        $this->render('register.html.twig', $data);
          
      }else{  
         /** renders registration page with alert*/
        $data = ['alert1' => 'The email you tried registring with already exist'];
        $this->render('register.html.twig', $data);
      } 

    }else{
       /** renders registration page*/
      $this->render('register.html.twig');
    }  
  }

  /**
   * Endpoint for user login/sign in
   * 
   * @param Request $request
   * @return mixed
   *
  */
  public function login(Request $request)
  {
    /** get the form data */  
    $email = $request->getPost('email');
    $password = $request->getPost('password');

    $request->startSession();//starts a session

     /** Test if form is submitted */
    if($request->isSubmitted())
    { 
      /** create a model object to fetch data from database */
      $UserTable = new Model;
      $user = $UserTable->findOneBy(User::class, ['email'=> $email]);// gets the user entity with user email
      /** save user login credentials to session storage */
      $request->sessionSaveThis('password', $password);
      $request->sessionSaveThis('email', $email );
      /** check for not empty user */
     if(!empty($user))
     {
        $originalPassword = '$2y$09$'. $user->getPassword();//concatinates to form the original hashed password 
        $email = $user->getEmail();// get user email from database

         $request->sessionSaveThis('originalPassword', $originalPassword);//saves original password in session storage
        /** checks if user credentials match and authenticates user, if not user is not authenticated */
        if($request->authenticated($password, $originalPassword))
        {
          $this->render('logged-in.html.twig', ['email' => $user->getEmail()] );//renders logged in page with user email
        }else{
          /**Renders login page with invalid password notification */
          $notification = ['alert3' => 'Invalid password'];
          $this->render('login.html', $notification );
        }
       
       /** Else if empty user in db, this else block runs  */ 
      }else{
        /**render this page with notication */
        $notification = [ 'alert2' => 'Invalid user, please kindly regiser to create your verixon account' ];
        $this->render('login.html', $notification);
      }
    /** checks if the logged in user is still authenticated or active */
    }elseif($request->authActive('password','originalPassword')) //requires session keys for password and hash
    { 
      /** if true render users logged in page */  
      $this->render('logged-in.html.twig', ['email' => $request->sessionGet('email')] );
    }
    else{
      /** if false render login page with login form */
      $this->render('login.html');
    }  

  }

  /**
   * Endpoint for logging out a logged in user
   * 
   * @param Request $request
   * @return Redirect : url @location//
   *
  */
  public function logout(Request $request){
    /**End session and logges out a user, redirect the user to home page */
     $request->endSession();
     Redirect::url('/');
  }


 /**
   * Endpoint for deleting a user from database
   * 
   * @param Request $request
   * @return Redirect : url @location/register
   *
 */
  public function deleteUser(Request $request) // working
  { 
    $request->startSession();//starts a session
    $userTable = new Model; //creates a model object for fetching data from database
    $user = $userTable->findOneBy(User::class, ['email' => $request->sessionGet('email')] );//finds a user with email stored in session
    $userTable->delete($user);//deletes the fetched user from database
    $request->endSession();//ends the session
    Redirect::url('/register');//redirects to the registration form page
  }
}
