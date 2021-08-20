<?php

use App\EnvLoader\Env;

(new Env('.env'));

return  [

    'CLOUD_NAME' => [
        'cloud_name' => getenv('CLOUD_NAME')
    ],

    getenv('CLOUD_NAME') => [
        'api_key' => getenv('CLOUD_API_KEY'),
        'api_secret' => getenv('CLOUD_API_SECRET')
    ],

    'CLOUD_ENVIRONMENT_VARIABLE' => [
        'environment_variable' => getenv('CLOUD_ENVIRONMENT_VARIABLE')
    ]

];
