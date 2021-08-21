<?php 

namespace App\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DocEntityManager{

    public function connection($driver){

        $db = include './config/database.php';

        switch ($driver) {

            case "sqlit":
              return 
              $connectionParams = array(
                // 'driver' => $driver = $db['default'],
                // 'host' => $db[$driver][],
                // 'dbname' =>$db[$driver][sqlite_database],
                // 'user' =>$db[$driver][],
                // 'password' =>$db[$driver][],
                );
                break;

            case "mysql":
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['mysql_host'],
                    'dbname' =>$db[$driver]['mysql_database'],
                    'user' =>$db[$driver]['mysql_username'],
                    'password' =>$db[$driver]['mysql_password'],
                );
                break;

            case "pdo_mysql":
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['pdo_mysql_host'],
                    'dbname' =>$db[$driver]['pdo_mysql_database'],
                    'user' =>$db[$driver]['pdo_mysql_username'],
                    'password' =>$db[$driver]['pdo_mysql_password'],
                );

                break;

            case "pdo_pgsql":
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['pgsql_host'],
                    'dbname' =>$db[$driver]['pgsql_database'],
                    'user' =>$db[$driver]['pgsql_username'],
                    'password' =>$db[$driver]['pgsql_password'],
                );

                break;    

            case "sqlsrv":
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['sqlsrv_host'],
                    'dbname' =>$db[$driver]['sqlsrv_database'],
                    'user' =>$db[$driver]['sqlsrv_username'],
                    'password' =>$db[$driver]['sqlsrv_password'],
                );
            break; 
            
            default: return 
            $connectionParams = array(
                'driver' => 'pdo_mysql', 
                'host' => $db['pdo_mysql']['pdo_mysql_host'],
                'dbname' =>$db['pdo_mysql']['pdo_mysql_database'],
                'user' =>$db['pdo_mysql']['pdo_mysql_username'],
                'password' =>$db['pdo_mysql']['pdo_mysql_password'],
            );
        }
    }


    public function getEntityManager(){ 

       $entityManager = null;

       $db = include './config/database.php';

        if($entityManager === null)
        {
           $paths = array('./app/Entities');
           $isDevMode = true;

           $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
           
           $driver = $db['default'];

           $connection_params = $this->connection($driver);

           $entityManager = EntityManager::create( $connection_params, $config);
           return $entityManager;
        }
   }



}