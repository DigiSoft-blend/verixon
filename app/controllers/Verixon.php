<?php

namespace App\controllers;

  use App\request\Request;
  use App\http\Response;
 
class Verixon extends Controller{

   
    public function index()
    {
      $this->render('welcome.html.twig');
    }

    public function dashboard()
    {
      $this->render('dashboard.html.twig');
    }

    public function login()
    {
      $this->render('login.html.twig');
    }

    public function register()
    {
      $this->render('register.html.twig');
    }
    
    public function gettingStarted(){
      $this->render('getting-started.html.twig');
    }

    public function sendMail(){
      $this->render('mail.html.twig');
    }

    public function fileUpload(){
      $this->render('fileUpload.html.twig');
    }

}
