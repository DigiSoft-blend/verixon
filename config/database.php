<?php

use App\EnvLoader\Env;

(new Env('.env'));

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */
    
    'default' => getenv('DB_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Verixon is shown below to make development simple.
    |
    |
    | All database work in Verixon is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */
  
  /**
  * doctrine sqlit configuration variables
  */ 

               

 'pdo_sqlite' => [
    'user' =>  getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'path' => getenv('DB_SQLITE_PATH'),
    'memory' =>  getenv('DB_SQLITE_MEMORY'),
  ], 
 /**
  * doctrine mysql configuration variables
  */   
 'mysqli' => [
   
    'url' => getenv('DATABASE_URL'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'dbname' => getenv('DB_DATABASE'),
    'user' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'unix_socket' => getenv('DB_MYSQLI_UNIX_SOCKET'),
    'charset' => getenv('DB_MYSQLI_CHARSET'),
    'ssl_key' => getenv('DB_MYSQLI_SSL_KEY'),
    'ssl_cert' => getenv('DB_MYSQLI_SSL_CERT'),
    'ssl_ca' => getenv('DB_MYSQLI_SSL_CA'),
    'ssl_capath' => getenv('DB_MYSQLI_SSL_CAPATH'),
    'ssl_cipher' => getenv('DB_MYSQLI_SSL_CIPHER'),
    'driverOptions' => getenv('DB_MYSQLI_DRIVER_OPTIONS'),
  ], 
 /**
  * doctrine pdo_mysql configuration variables
  */
  'pdo_mysql'=>[

    'user' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'dbname' => getenv('DB_DATABASE'),
    'unix_socket' => getenv('DB_MYSQL_UNIX_SOCKET'),
    'charset' => getenv('DB_MYSQL_CHARSET'),

  ],

'pdo_oci'=>[

  'user' => getenv('DB_USERNAME'),
  'password' => getenv('DB_PASSWORD'),
  'host' => getenv('DB_HOST'),
  'port' => getenv('DB_PORT'),
  'dbname' => getenv('DB_DATABASE'),
  'servicename' => getenv('DB_OCI_SERVICE_NAME'),
  'service' => getenv('DB_OCI_SERVICE'),
  'pooled' => getenv('DB_OCI_POOLED'),
  'charset' => getenv('DB_OCI_CHARSET'),
  'instancename' =>  getenv('DB_OCI_INSTANCENAME'),
  'connectstring' =>  getenv('DB_OCI_CONNECTSTRING'),
  'persistent' => getenv('DB_OCI_PERSISTENT'),
],  
 /**
  * doctrine pgsql configuration variables
  */
  'pdo_pgsql' => [

    'user' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'dbname' => getenv('DB_DATABASE'),
    'charset' => getenv('DB_PGSQL_CHARSET'),
    'default_dbname' => getenv('DB_PGSQL_DEFAULT_DBNAME'),
    'sslmode' => getenv('DB_PGSQL_SSLMODE'),
    'sslrootcert' => getenv('DB_PGSQL_SSL_ROOT_CERT'),
    'sslcert' => getenv('DB_PGSQL_SSLCERT'),
    'sslkey' => getenv('DB_PGSQL_SSLKEY'),
    'sslcrl' => getenv('DB_PGSQL_SSLCRL'),
    'application_name' => getenv('DB_PGSQL_APP_NAME'),
  ],

 /**
  * doctrine sqlsrv configuration variables
  */  
  'pdo_sqlsrv'=>[

      'host' => getenv('DB_HOST'),
      'dbname'=>  getenv('DB_DATABASE'),
      'user' => getenv('DB_USERNAME'),
      'password' => getenv('DB_PASSWORD'),
      
    ],
    
        

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Verixon makes it easy to dig right in.
    |
    */

    // 'redis' => [

    //     'client' => getenv('REDIS_CLIENT'),

    //     'options' => [
    //         'cluster' => getenv('REDIS_CLUSTER'),
    //         'prefix' => getenv('REDIS_PREFIX'),
    //     ],

    //     'default' => [
    //         'url' => getenv('REDIS_URL'),
    //         'host' => getenv('REDIS_HOST'),
    //         'password' => getenv('REDIS_PASSWORD'),
    //         'port' => getenv('REDIS_PORT'),
    //         'database' => getenv('REDIS_DB'),
    //     ],

    //     'cache' => [
    //         'url' => getenv('REDIS_URL'),
    //         'host' => getenv('REDIS_HOST'),
    //         'password' => getenv('REDIS_PASSWORD'),
    //         'port' => getenv('REDIS_PORT'),
    //         'database' => getenv('REDIS_CACHE_DB'),
    //     ],

    // ],

];
