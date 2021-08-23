<?php 

namespace App\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Class DocEntityManager: Doctrine diriver class for verixon
 *
 * @internal @verixon
*/

class DocEntityManager{

    /**
     * returns  doctrine db connection parameters defined in verixons .env
     * 
     * @param $driver
     * 
     * @return array :$connectionParams
     *
     */
    public function connection($driver){

        $db = include './config/database.php'; // include database configurations defined in config and verixons .env

        switch ($driver) {

            case "pdo_sqlite":
             /**
             * returns  doctrine pdo_sqlite db connection parameters defined in verixons .env
             * 
             * @return array :$connectionParams for pdo_sqlite
             *
             */
              return 
              $connectionParams = array(
                'driver' => $driver = $db['default'],
                'user' =>$db[$driver]['user'],
                'password' =>$db[$driver]['password'],
                'path' =>$db[$driver]['path'],
                'memory' =>$db[$driver]['memory'],
                );
                break;

            case "mysqli":
            /**
             * returns  doctrine mysqli db connection parameters defined in verixons .env
             * 
             * @return array :$connectionParams for mysqli
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['host'],
                    'port' => $db[$driver]['port'],
                    'dbname' =>$db[$driver]['dbname'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                    'unix_socket' =>$db[$driver]['unix_socket'],
                    'charset' =>$db[$driver]['charset'],
                    'ssl_key' =>$db[$driver]['ssl_key'],
                    'ssl_cert' =>$db[$driver]['ssl_cert'],
                    'ssl_ca' =>$db[$driver]['ssl_ca'],
                    'ssl_capath' =>$db[$driver]['ssl_capath'],
                    'ssl_cipher' =>$db[$driver]['ssl_cipher'],
                    'driverOptions' =>$db[$driver]['driverOptions'],
                );
                break;

            case "pdo_oci":
             /**
             * returns  doctrine pdo_oci db connection parameters defined in verixons .env
             * 
             * @return array :$connectionParams for pdo_oci
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                    'host' => $db[$driver]['host'],
                    'port' => $db[$driver]['port'],
                    'dbname' =>$db[$driver]['dbname'],
                    'servicename' => $db[$driver]['servicename'],
                    'service' => $db[$driver]['service'],
                    'pooled' => $db[$driver]['pooled'],
                    'charset' => $db[$driver]['charset'],
                    'instancename' => $db[$driver]['instancename'],
                    'connectstring' => $db[$driver]['connectstring'],
                    'persistent' => $db[$driver]['persistent'],
                );
                break;

            case "sqlsrv":
             /**
             * returns  doctrine sqlsrv db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for sqlsrv
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['host'],
                    'port' => $db[$driver]['port'],
                    'dbname' =>$db[$driver]['dbname'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                );
                break;

            case "pdo_mysql":
             /**
             * returns  doctrine pdo_mysql db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_mysql
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                    'host' => $db[$driver]['host'],
                    'port' => $db[$driver]['port'],
                    'dbname' =>$db[$driver]['dbname'],
                    'unix_socket' =>$db[$driver]['unix_socket'],
                    'charset' =>$db[$driver]['charset'],
                );

                break;

            case "pdo_pgsql":
             /**
             * returns  doctrine pdo_pgsql db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_pgsql
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                    'host' => $db[$driver]['host'],
                    'port' => $db[$driver]['port'],
                    'dbname' =>$db[$driver]['dbname'],
                    'charset' => $db[$driver]['charset'],
                    'default_dbname' => $db[$driver]['default_dbname'],
                    'sslmode' => $db[$driver]['sslmode'],
                    'sslrootcert' => $db[$driver]['sslrootcert'],
                    'sslcert' => $db[$driver]['sslcert'],
                    'sslkey' => $db[$driver]['sslkey'],
                    'sslcrl' => $db[$driver]['sslcrl'],
                    'application_name' => $db[$driver]['application_name'],
                );

                break;    

            case "pdo_sqlsrv":
             /**
             * returns  doctrine pdo_sqlsrv db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_sqlsrv
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['host'],
                    'dbname' =>$db[$driver]['dbname'],
                    'user' =>$db[$driver]['user'],
                    'password' =>$db[$driver]['password'],
                );
            break; 

             /**
             * returns  doctrine default db connection parameters defined in verixons .env: default = pdo_mysql
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_mysql
             *
             */
            
            default: return 
            $connectionParams = array(
                'driver' => 'pdo_mysql', 
                'host' => $db['pdo_mysql']['host'],
                'dbname' =>$db['pdo_mysql']['dbname'],
                'user' =>$db['pdo_mysql']['user'],
                'password' =>$db['pdo_mysql']['password'],
                'port' => $db['pdo_mysql']['port'],
                'unix_socket' =>$db['pdo_mysql']['unix_socket'],
                'charset' =>$db['pdo_mysql']['charset'],
            );
        }
    }

    /**
     *Returns doctrine entity manager instance for accessing db entities defined in the Entity::class
     * 
     * @return EntityManager :doctrine entity manager
     */
    public function getEntityManager(){ 

       $entityManager = null;//set entityManager variable to null

       $db = include './config/database.php'; // gets database configurations from config/database configuration supplied in verixons .env

       /** check if entity manager is null, if true run the code inside the if block */
        if($entityManager === null)
        {
           $paths = array('./app/Entities');//sets the default path for fetching doctrine database entities
           $isDevMode = true;//sets devMode to true
           /** Sets up doctrine and creates annotation metadata configuration from specified paths with options */
           $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
           
           $driver = $db['default'];//gets default driver 

           $connection_params = $this->connection($driver); // gets defined db driver connection parameters
           /** returns EntityManager class instance */
           $entityManager = EntityManager::create( $connection_params, $config);
           return $entityManager;
        }
   }



}