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
 'sqlit' => [
    'sqlite_driver' => 'sqlite',
    'sqlite_url' => getenv('DATABASE_URL'),
    'sqlite_database' => getenv('DB_DATABASE'),
    'sqlite_prefix' => '',
    'sqlite_foreign_key_constraints' => getenv('DB_FOREIGN_KEYS'),
  ], 
 /**
  * doctrine mysql configuration variables
  */   
 'mysql' => [
    'mysql_driver' => 'mysql',
    'mysql_url' => getenv('DATABASE_URL'),
    'mysql_host' => getenv('DB_HOST'),
    'mysql_port' => getenv('DB_PORT'),
    'mysql_database' => getenv('DB_DATABASE'),
    'mysql_username' => getenv('DB_USERNAME'),
    'mysql_password' => getenv('DB_PASSWORD'),
    'mysql_unix_socket' => getenv('DB_SOCKET'),
    'mysql_charset' => 'utf8mb4',
    'mysql_collation' => 'utf8mb4_unicode_ci',
    'mysql_prefix' => '',
    'mysql_prefix_indexes' => true,
    'mysql_strict' => true,
    'mysql_engine' => null,
    'mysql_options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
    ]) : [],
  ], 
 /**
  * doctrine pdo_mysql configuration variables
  */
  'pdo_mysql'=>[
    'pdo_mysql_driver' => 'pdo_mysql',
    'pdo_mysql_url' => getenv('DATABASE_URL'),
    'pdo_mysql_host' => getenv('DB_HOST'),
    'pdo_mysql_port' => getenv('DB_PORT'),
    'pdo_mysql_database' => getenv('DB_DATABASE'),
    'pdo_mysql_username' => getenv('DB_USERNAME'),
    'pdo_mysql_password' => getenv('DB_PASSWORD'),
    'pdo_mysql_unix_socket' => getenv('DB_SOCKET'),
    'pdo_mysql_charset' => 'utf8mb4',
    'pdo_mysql_collation' => 'utf8mb4_unicode_ci',
    'pdo_mysql_prefix' => '',
    'pdo_mysql_prefix_indexes' => true,
    'pdo_mysql_strict' => true,
    'pdo_mysql_engine' => null,
  ],
    
 /**
  * doctrine pgsql configuration variables
  */
  'pgsql' => [
    'pgsql_driver' => 'pgsql',
    'pgsql_url' => getenv('DATABASE_URL'),
    'pgsql_host' => getenv('DB_HOST'),
    'pgsql_port' => getenv('DB_PORT'),
    'pgsql_database' => getenv('DB_DATABASE'),
    'pgsql_username' => getenv('DB_USERNAME'),
    'pgsql_password' => getenv('DB_PASSWORD'),
    'pgsql_charset' => 'utf8',
    'pgsql_prefix' => '',
    'pgsql_prefix_indexes' => true,
    'pgsql_schema' => 'public',
    'pgsql_sslmode' => 'prefer',
  ],

 /**
  * doctrine sqlsrv configuration variables
  */  
  'sqlsrv'=>[
    'sqlsrv_driver' => 'sqlsrv',
    'sqlsrv_url' => getenv('DATABASE_URL'),
    'sqlsrv_host' => getenv('DB_HOST'),
    'sqlsrv_port' => getenv('DB_PORT'),
    'sqlsrv_database' => getenv('DB_DATABASE'),
    'sqlsrv_username' => getenv('DB_USERNAME'),
    'sqlsrv_password' => getenv('DB_PASSWORD'),
    'sqlsrv_charset' => 'utf8',
    'sqlsrv_prefix' => '',
    'sqlsrv_prefix_indexes' => true,
    ],
    
        
    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

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

    'redis' => [

        'client' => getenv('REDIS_CLIENT'),

        'options' => [
            'cluster' => getenv('REDIS_CLUSTER'),
            'prefix' => getenv('REDIS_PREFIX'),
        ],

        'default' => [
            'url' => getenv('REDIS_URL'),
            'host' => getenv('REDIS_HOST'),
            'password' => getenv('REDIS_PASSWORD'),
            'port' => getenv('REDIS_PORT'),
            'database' => getenv('REDIS_DB'),
        ],

        'cache' => [
            'url' => getenv('REDIS_URL'),
            'host' => getenv('REDIS_HOST'),
            'password' => getenv('REDIS_PASSWORD'),
            'port' => getenv('REDIS_PORT'),
            'database' => getenv('REDIS_CACHE_DB'),
        ],

    ],

];
