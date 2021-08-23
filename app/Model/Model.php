<?php

namespace App\Model;

use App\Doctrine\DocEntityManager as dbManager;

/**
 * Class Mailer: verixons driver for sending emails
 *
 * @internal @verixon
*/ 
class Model
{   
    /**
     * @var object $DocEntityManager as alias dbmanager instance
    */ 
    protected $entityManager;

    /**
     * Model class constructor
     * 
     * @return object : dbManager alias for DocEntityManager: entityManager instance
     *
    */
    public function  __construct(){
        $db = new dbManager;
        $this->entityManager = $db->getEntityManager();
    }
    
    /**
     *updates data in database wth enctity class name and id of data
     * 
     * @param object $className
     * @param int $id
     * 
     * @return mixed 
     *
    */
    public function update($className, $id){
        $Repository = $this->entityManager->find($className, $id);
        if($Repository === null){
            echo "User $id does not exist.\n";
            exit(1);
        }
        return $Repository;
    }

    /**
     * fetches all data in database wth enctity className
     * 
     * @param object $className: Entity
     * 
     * @return mixed 
     *
    */
    public function all($className){
        $Repository = $this->entityManager->getRepository($className);
        $all = $Repository->findAll();
        return $all;
    }

    /**
     * finds a single data in database wth enctity className
     * 
     * @param object $className: Entity
     * @param int $id
     * 
     * @return object:  $Repository
     *
    */
   public function find($className, $id){
    $Repository = $this->entityManager->find($className, $id);
    if($Repository === null){
        echo "No User found .\n";
        exit(1);
    }
     return $Repository;
   }  
   
    /**
     * finds a single data with specified properties in database wth enctity className
     * 
     * @param object $className: Entity
     * @param array $arrayProperites [email=>$email, id=>$id]
     * 
     * @return object:  $data: findOneBy property [email=>$email, id=>$id]
     *
    */
   public function findOneBy($className, $arrayProperites=[]){
    $Repository = $this->entityManager->getRepository($className);
    $data = $Repository->findOneBy($arrayProperites);
     return $data;
   }  
    /**
     * deletes table data from db
     * 
     * @param object $tableData
     *
    */ 
   public function delete($tableData){
    $Repository = $this->entityManager;
    if($Repository === null){
        echo "Nothing to delete .\n";
        exit(1);
    }
     $Repository->remove($tableData);
     $Repository->flush();
   }  

   /**
     * Creates an EntityClass instance
     * 
     * @param object $entityClass
     * 
     * @return object $user : entityClass instance 
     *
    */ 
   public function insert($entityClass)
   {
       $user = new $entityClass();
       return $user;
   }
   /**
     * Perisist entity data in db
     * 
     * @param object $tableObjectData
     *
    */ 
   public function save($tableObjectData)
   {
    $this->entityManager->persist($tableObjectData);
    $this->entityManager->flush();
   }

}

/**
 * Doctrine Commands for creating and updating Entities in db
 * 
 * $ vendor/bin/doctrine orm:schema-tool:create      //for creatig fresh entity entries in database
 * 
 * $ vendor/bin/doctrine orm:schema-tool:update --force   //for updating database with new entities
 *
*/ 

    