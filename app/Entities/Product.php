<?php

namespace App\Entities;

/**
 * @Entity @Table(name = "product")
 */

 class Product
 {
     /** @id @Column(type = "integer") @generatedValue */
     protected $id;

     /** @Column(type="string") */
     protected $name;

     /** @Column(type="string") */
     protected $description;

     /** @Column(type="integer") */
     protected $price;

     /** @Column(type="integer") */
     protected $totalpurchased;



 
        # Accessors
        
        public function getId():int
        {
            return $this->id;
        }

        public function getName():string
        {
           return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getDescription():string
        {
            return $this->description;
        }
        
        public function setDescription($description){
            $this->description = $description;
        }

        public function getPrice():string
        {
           return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getTotalPurchased():string
        {
           return $this->totalpurchased;
        }

        public function setTotalPurchased($totalpurchased)
        {
            $this->totalpurchased = $totalpurchased;
        }
     
 }