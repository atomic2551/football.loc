<?php
return [
    'id' => 'my-app',
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            'cookieValidationKey' => 'random-secret-key',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'upload/profile-pic' => 'user/upload-profile-pic',
            ],
        ],
    ],
];
