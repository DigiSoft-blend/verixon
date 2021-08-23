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
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_sqlite
             *
             */
              return 
              $connectionParams = array(
                'driver' => $driver = $db['default'],
                'user' =>$db[$driver]['pdo_sqlite_user'],
                'password' =>$db[$driver]['pdo_sqlite_password'],
                'path' =>$db[$driver]['pdo_sqlite_path'],
                'memory' =>$db[$driver]['pdo_sqlite_memory'],
                );
                break;

            case "mysqli":
                
            /**
             * returns  doctrine mysqli db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for mysqli
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['mysqli_host'],
                    'dbname' =>$db[$driver]['mysqli_database'],
                    'user' =>$db[$driver]['mysqli_username'],
                    'password' =>$db[$driver]['mysqli_password'],
                    'unix_socket' =>$db[$driver]['mysqli_unix_socket'],
                    'charset' =>$db[$driver]['mysqli_charset'],
                    'ssl_key' =>$db[$driver]['mysqli_ssl_key'],
                    'ssl_cert' =>$db[$driver]['mysqli_ssl_cert'],
                    'ssl_ca' =>$db[$driver]['mysqli_ssl_ca'],
                    'ssl_capath' =>$db[$driver]['mysqli_ssl_capath'],
                    'ssl_cipher' =>$db[$driver]['mysqli_ssl_cipher'],
                    'driverOptions' =>$db[$driver]['mysqli_driverOptions'],
                );
                break;
            case "pdo_oci":
             /**
             * returns  doctrine pdo_oci db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for pdo_oci
             *
             */
                return 
                $connectionParams = array(
                    'driver' => $driver = $db['default'],
                    'host' => $db[$driver]['mysql_host'],
                    'dbname' =>$db[$driver]['mysql_database'],
                    'user' =>$db[$driver]['mysql_username'],
                    'password' =>$db[$driver]['mysql_password'],
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
                    'host' => $db[$driver]['mysql_host'],
                    'dbname' =>$db[$driver]['mysql_database'],
                    'user' =>$db[$driver]['mysql_username'],
                    'password' =>$db[$driver]['mysql_password'],
                );
                break;
            case "oci8":
             /**
             * returns  doctrine oci8 db connection parameters defined in verixons .env
             * 
             * @param $driver
             * 
             * @return array :$connectionParams for oci8
             *
             */
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
                    'user' =>$db[$driver]['pdo_mysql_username'],
                    'password' =>$db[$driver]['pdo_mysql_password'],
                    'host' => $db[$driver]['pdo_mysql_host'],
                    'port' => $db[$driver]['pdo_mysql_port'],
                    'dbname' =>$db[$driver]['pdo_mysql_database'],
                    'unix_socket' =>$db[$driver]['pdo_mysql_unix_socket'],
                    'charset' =>$db[$driver]['pdo_mysql_charset'],
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
                    'user' =>$db[$driver]['pgsql_username'],
                    'password' =>$db[$driver]['pgsql_password'],
                    'host' => $db[$driver]['pgsql_host'],
                    'port' => $db[$driver]['pgsql_port'],
                    'dbname' =>$db[$driver]['pgsql_database'],
                    'charset' => $db[$driver]['pgsql_charset'],
                    'default_dbname' => $db[$driver]['pgsql_default_dbname'],
                    'sslmode' => $db[$driver]['pgsql_sslmode'],
                    'sslrootcert' => $db[$driver]['pgsql_sslrootcert'],
                    'sslcert' => $db[$driver]['pgsql_sslcert'],
                    'sslkey' => $db[$driver]['pgsql_sslkey'],
                    'sslcrl' => $db[$driver]['pgsql_sslcrl'],
                    'application_name' => $db[$driver]['pgsql_application_name'],
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
                    'host' => $db[$driver]['sqlsrv_host'],
                    'dbname' =>$db[$driver]['sqlsrv_database'],
                    'user' =>$db[$driver]['sqlsrv_username'],
                    'password' =>$db[$driver]['sqlsrv_password'],
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
                'host' => $db['pdo_mysql']['pdo_mysql_host'],
                'dbname' =>$db['pdo_mysql']['pdo_mysql_database'],
                'user' =>$db['pdo_mysql']['pdo_mysql_username'],
                'password' =>$db['pdo_mysql']['pdo_mysql_password'],
                'port' => $db['pdo_mysql']['pdo_mysql_port'],
                'unix_socket' =>$db['pdo_mysql']['pdo_mysql_unix_socket'],
                'charset' =>$db['pdo_mysql']['pdo_mysql_charset'],
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