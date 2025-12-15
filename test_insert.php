<?php
// test_students.php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// Yii console konfiguratsiyasi
$config = [
    'id' => 'console-app',
    'basePath' => __DIR__,
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2advanced',
            'username' => 'root',      // sizning MySQL username
            'password' => 'root',      // sizning MySQL password
            'charset' => 'utf8',
        ],
    ],
];

$application = new yii\console\Application($config);

// ----------------------
// 1️⃣ Yangi student qo'shish
// ----------------------
$application->db->createCommand()->insert('students', [
    'fullname'   => 'Ali Valiyev',
    'group'      => '6A',
    'age'        => 15,
    'created_at' => time(),
    'updated_at' => time(),
])->execute();

$application->db->createCommand()->insert('students', [
    'fullname'   => 'Sardor Karimov',
    'group'      => '6B',
    'age'        => 16,
    'created_at' => time(),
    'updated_at' => time(),
])->execute();

echo "Ma'lumotlar qo'shildi!\n";

// ----------------------
// 2️⃣ Barcha studentlarni chiqarish
// ----------------------
$students = $application->db->createCommand('SELECT * FROM students')->queryAll();

echo "Jadvaldagi barcha studentlar:\n";
foreach ($students as $student) {
    echo "ID: {$student['id']}, Fullname: {$student['fullname']}, Group: {$student['group']}, Age: {$student['age']}\n";
}
