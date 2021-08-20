<?php

namespace App\Entities;

use App\hashing\Hash;

/**
 * @Entity @Table(name = "user")
 */

 class User
 {
     /** @id @Column(type = "integer") @generatedValue */
     protected $id;

     /** @Column(type="string", unique=true, nullable=false) */
     protected $email;

     /** @Column(type="string", nullable=false) */
     protected $password;

     /** @Column(type="string", nullable=true) */
     protected $secure_url;

     /** @Column(type="string",nullable=true) */
     protected $public_id;


        # Accessors
        
        public function getId():int
        {
            return $this->id;
        }

       
        public function getImgPublicID():string
        {
            return $this->public_id;
        }

        public function setImgPublicID($public_id)
        {
             $this->public_id = $public_id;
        }

        
        public function getImgSecureUrl():string
        {
            return $this->secure_url;
        }

        public function setImgSecureUrl($secure_url)
        {
            $this->secure_url = $secure_url;
        }


        public function getEmail():string
        {
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }

        public function getPassword():string
        {
           return $this->password;
        }

        public function setPassword($password){

            $Hpassword = Hash::hashThis($password);
            $str = explode('$',$Hpassword);
            $strEnd = end($str);

            $this->password =  $strEnd;
        }
     
 }