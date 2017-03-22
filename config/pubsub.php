<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default
    |--------------------------------------------------------------------------
    |
    | The default pub-sub connection to use.
    |
    | Supported: "/dev/null", "local", "redis", "kafka", "gcloud"
    |
    */

    'default' => env('PUBSUB_CONNECTION', 'redis'),

    /*
    |--------------------------------------------------------------------------
    | Pub-Sub Connections
    |--------------------------------------------------------------------------
    |
    | The available pub-sub connections to use.
    |
    | A default configuration has been provided for all adapters shipped with
    | the package.
    |
    */

    'connections' => [

        '/dev/null' => [
            'driver' => '/dev/null',
        ],

        'local' => [
            'driver' => 'local',
        ],

        'redis' => [
            'driver' => 'redis',
            'scheme' => 'tcp',
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
            'read_write_timeout' => 0,
        ],

        'kafka' => [
            'driver' => 'kafka',
            'consumer_group_id' => 'php-pubsub',
            'brokers' => env('KAFKA_BROKERS', 'localhost')
        ],

        'gcloud' => [
            'driver' => 'gcloud',
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID'),
            'key_file' => env('GOOGLE_CLOUD_KEY_FILE'),
            'client_identifier' => null,
            'auto_create_topics' => true,
            'auto_create_subscriptions' => true,
        ],

        'cmq' => [
            'driver' => 'cmq',
            'secret_id'  => env('CMQ_SECRET_ID'),
            'secret_key' => env('CMQ_SECRET_KEY'),
            'queue_end_point'  => env('CMQ_QUEUE_END_POINT'),
            'topic_end_point'  => env('CMQ_TOPIC_END_POINT'),
            'options'    => [
                'debug'   => env('GUZZLE_HTTP_DEBUG', false),
                'timeout' => env('GUZZLE_HTTP_TIMEOUT', 10),
            ]
        ]

    ],

];
