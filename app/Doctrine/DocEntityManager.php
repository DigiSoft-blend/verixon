<?php 

namespace App\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DocEntityManager{

    public function getEntityManager(){ 

       $entityManager = null;

       $db = include './config/database.php';

        if($entityManager === null)
        {
            $paths = array('./app/Entities');
            $isDevMode = true;

           $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
              
            $connectionParams = array(
                'driver' =>$db->configurations['pdo_mysql_driver'],
                'host' =>$db->configurations['pdo_mysql_host'],
                'dbname' =>$db->configurations['pdo_mysql_database'],
                'user' =>$db->configurations['pdo_mysql_username'],
                'password' =>$db->configurations['pdo_mysql_password'],
            );
            
           
        $entityManager = EntityManager::create($connectionParams, $config);

         return $entityManager;
         
        }
   }

}