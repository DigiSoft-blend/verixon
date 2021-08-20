<?php

namespace App\Model;

use App\Doctrine\DocEntityManager as dbManager;

class Model
{

    protected $entityManager;

    public function  __construct(){
        $db = new dbManager;
        $this->entityManager = $db->getEntityManager();
    }

     

    public function update($className, $id){
        $Repository = $this->entityManager->find($className, $id);
        if($Repository === null){
            echo "User $id does not exist.\n";
            exit(1);
        }
        return $Repository;
    }


    public function all($className){
        $Repository = $this->entityManager->getRepository($className);
        $all = $Repository->findAll();
        return $all;
    }



   public function find($className, $id){
    $Repository = $this->entityManager->find($className, $id);
    if($Repository === null){
        echo "No User found .\n";
        exit(1);
    }
     return $Repository;
   }  
   
   public function findOneBy($className, $arrayProperites=[]){
    $Repository = $this->entityManager->getRepository($className);
    $data = $Repository->findOneBy($arrayProperites);
     return $data;
   }  

   public function delete($tableData){
    $Repository = $this->entityManager;
    if($Repository === null){
        echo "Nothing to delete .\n";
        exit(1);
    }
     $Repository->remove($tableData);
     $Repository->flush();
   }  


   public function insert($entityClass)
   {
       $user = new $entityClass();
       return $user;
   }

   public function save($tableObjectData)
   {
    $this->entityManager->persist($tableObjectData);
    $this->entityManager->flush();
   }

   
}

//$ vendor/bin/doctrine orm:schema-tool:create            ??for creatig fresh entity entries in database
//$ vendor/bin/doctrine orm:schema-tool:update --force   ??for updating database with new entities