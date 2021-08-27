<?php

namespace App\controllers;

  use App\request\Request;
  use App\http\Response;
  use App\hashing\Hash;
  use App\Encryption\Crypto;

class Verixon extends Controller{

   
    public function index()
    {
      $this->render('welcome.html');
      // echo 'ok';
    }

    // public function dashboard()
    // {
    //   $this->render('dashboard.html.twig');
    // }

    // public function login()
    // {
    //   $this->render('login.html.twig');
    // }

    // public function register()
    // {
    //   $this->render('register.html.twig');
    // }
    
    // public function gettingStarted(){
    //   $this->render('getting-started.html.twig');
    // }

    // public function sendMail(){
    //   $this->render('mail.html.twig');
    // }
    

    // public function fileUpload()
    // {
    //   $this->render('fileUpload.html.twig');
    // }

    // public function noNetworkConnection(){
    //   $this->render('no-network.html.twig');
    // }

}
