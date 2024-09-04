<?php
$host = 'MySQL-8.2';
$db = 'my_db';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
//     echo "Подключение успешно!";
// } catch (PDOException $e) {
//     echo "Ошибка подключения: " . $e->getMessage();
// }