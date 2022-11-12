<?php

return [
    'APP_NAME'=>env('APP_NAME', null),
    'APP_ENV'=>env('APP_ENV', null),
    'APP_KEY'=>env('APP_KEY', null),
    'APP_DEBUG'=>env('APP_DEBUG', null),
    'APP_URL'=>env('APP_URL', null),
    'APP_API_URL'=>env('APP_API_URL', null),
    'APP_FRONT_END_URL'=>env('APP_FRONT_END_URL', null),
    
    'LOG_CHANNEL'=>env('LOG_CHANNEL', null),
    'LOG_DEPRECATIONS_CHANNEL'=>env('LOG_DEPRECATIONS_CHANNEL', null),
    'LOG_LEVEL'=>env('LOG_LEVEL', null),
    
    'DB_CONNECTION'=>env('DB_CONNECTION', null),
    'DB_HOST'=>env('DB_HOST', null),
    'DB_PORT'=>env('DB_PORT', null),
    'DB_DATABASE'=>env('DB_DATABASE', null),
    'DB_USERNAME'=>env('DB_USERNAME', null),
    'DB_PASSWORD'=>env('DB_PASSWORD', null),
    
    'BROADCAST_DRIVER'=>env('BROADCAST_DRIVER', null),
    'CACHE_DRIVER'=>env('LINE_ID', null),
    'FILESYSTEM_DRIVER'=>env('FILESYSTEM_DRIVER', null),
    'QUEUE_CONNECTION'=>env('QUEUE_CONNECTION', null),
    'SESSION_DRIVER'=>env('SESSION_DRIVER', null),
    'SESSION_LIFETIME'=>env('SESSION_LIFETIME', null),
    
    'MEMCACHED_HOST'=>env('MEMCACHED_HOST', null),
    
    'REDIS_HOST'=>env('REDIS_HOST', null),
    'REDIS_PASSWORD'=>env('REDIS_PASSWORD', null),
    'REDIS_PORT'=>env('REDIS_PORT', null),
    
    'MAIL_MAILER'=>env('MAIL_MAILER', null),
    'MAIL_HOST'=>env('MAIL_HOST', null),
    'MAIL_PORT'=>env('MAIL_PORT', null),
    'MAIL_USERNAME'=>env('MAIL_USERNAME', null),
    'MAIL_PASSWORD'=>env('MAIL_PASSWORD', null),
    'MAIL_ENCRYPTION'=>env('MAIL_ENCRYPTION', null),
    'MAIL_FROM_ADDRESS'=>env('MAIL_FROM_ADDRESS', null),
    'MAIL_FROM_NAME'=>env('MAIL_FROM_NAME', null),
    
    'AWS_ACCESS_KEY_ID'=>env('AWS_ACCESS_KEY_ID', null),
    'AWS_SECRET_ACCESS_KEY'=>env('AWS_SECRET_ACCESS_KEY', null),
    'AWS_DEFAULT_REGION'=>env('AWS_DEFAULT_REGION', null),
    'AWS_BUCKET'=>env('AWS_BUCKET', null),
    'AWS_USE_PATH_STYLE_ENDPOINT'=>env('AWS_USE_PATH_STYLE_ENDPOINT', null),
    
    'GOOGLE_CLOUD_PROJECT_ID'=>env('GOOGLE_CLOUD_PROJECT_ID', null),
    'GOOGLE_CLOUD_KEY_FILE'=>env('GOOGLE_CLOUD_KEY_FILE', null),
    'GOOGLE_CLOUD_STORAGE_BUCKET'=>env('GOOGLE_CLOUD_STORAGE_BUCKET', null),
    
    'PUSHER_APP_ID'=>env('PUSHER_APP_ID', null),
    'PUSHER_APP_KEY'=>env('PUSHER_APP_KEY', null),
    'PUSHER_APP_SECRET'=>env('PUSHER_APP_SECRET', null),
    'PUSHER_APP_CLUSTER'=>env('PUSHER_APP_CLUSTER', null),
    
    'MIX_PUSHER_APP_KEY'=>env('MIX_PUSHER_APP_KEY', null),
    'MIX_PUSHER_APP_CLUSTER'=>env('MIX_PUSHER_APP_CLUSTER', null),
    
    'TIMEZONE'=>env('TIMEZONE', null),
    
    'LINE_ID' => env('LINE_ID', null),
    'LINE_CHANNEL_ID' => env('LINE_CHANNEL_ID', null),
    'LINE_CHANNEL_SCRET' => env('LINE_CHANNEL_SCRET', null),
    'LINE_MESSAGE_API_CHANNEL_ACCESS_TOKEN' => env('LINE_MESSAGE_API_CHANNEL_ACCESS_TOKEN', null),
    'LINE_TEST_USER_ID' => env('LINE_TEST_USER_ID', null),
    'LINE_IMG_CACHE_TIME' => env('LINE_IMG_CACHE_TIME', null),

    'EASY_GO_SMS_API_URL' => env('EASY_GO_SMS_API_URL', null),
    'EASY_GO_SMS_ACCOUNT' => env('EASY_GO_SMS_ACCOUNT', null),
    'EASY_GO_SMS_PASSWORD' => env('EASY_GO_SMS_PASSWORD', null),
    
    'RECOGNIZE'         => env('RECOGNIZE', in_array(config('env.APP_ENV'),['production']) ),
    'RECOGNIZE_API_URL' => env('RECOGNIZE_API_URL', null),
    'RECOGNIZE_ACCOUNT' => env('RECOGNIZE_ACCOUNT', null),
    'RECOGNIZE_PASSWORD' => env('RECOGNIZE_PASSWORD', null)

];