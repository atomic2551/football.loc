<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// Konfiguratsiya
$config = [
    'id' => 'app-console',
    'basePath' => __DIR__,
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2advanced',
            'username' => 'root',
            'password' => 'root', // MySQL password
            'charset' => 'utf8',
        ],
    ],
];

// Ilovani ishga tushirish
$application = new yii\console\Application($config);

// Students jadvaliga ma'lumot qo'shish
Yii::$app->db->createCommand()->insert('students', [
    'fullname' => 'Aliyev Rahmatjon',
    'group' => '6-A',
    'age' => 20,
    'created_at' => time(),
    'updated_at' => time(),
])->execute();

echo "Ma'lumot qo'shildi!\n";
