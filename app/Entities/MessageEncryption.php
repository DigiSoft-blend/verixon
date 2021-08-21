<?php

namespace App\Entities;

/**
 * @Entity @Table(name = "messageencryption")
 */

 class MessageEncryption
 {
     /** @id @Column(type = "integer") @generatedValue */
     protected $id;

     /** @Column(type="string") */
     protected $encryptedmessage;

     /** @Column(type="string") */
     protected $envelop;


        # Accessors
        
        public function getId():int
        {
            return $this->id;
        }

        public function getEncryptedMessage():string
        {
           return $this->encryptedmessage;
        }

        public function setEncryptedMessage($encryptedmessage){
            $this->encryptedmessage = $encryptedmessage;
        }

        public function getEnvelop():string
        {
            return $this->envelop;
        }

        public function setEnvelop($envelop){
            $this->envelop = $envelop;
        }
     
 }