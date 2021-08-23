<?php

use App\EnvLoader\Env;

(new Env('.env'));// gets verixon .env variables

/**
   * sets cloudinary to .env cloudinary variables
   *  
   * @return array .env cloudinary variables
   *
*/

return  [

    'CLOUD_NAME' => [
        'cloud_name' => getenv('CLOUD_NAME') // sets .env cloud name
    ],

    getenv('CLOUD_NAME') => [
        'api_key' => getenv('CLOUD_API_KEY'), //sets .env cloud api key
        'api_secret' => getenv('CLOUD_API_SECRET') //sets .env cloud api secrete
    ],

    'CLOUD_ENVIRONMENT_VARIABLE' => [
        'environment_variable' => getenv('CLOUD_ENVIRONMENT_VARIABLE') // sets .env cloud environment variables
    ]

];
