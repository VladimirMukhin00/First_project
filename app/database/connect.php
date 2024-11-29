<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'dinamic-site'; // название БД
$db_user = 'root'; // юзер, который будет подключаться к БД
$db_pass = 'mysql'; // пароль для подключения
$charset = 'utf8mb4'; // кодировка
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]; // убираем дублирование при выводе БД (индексы)

try{
    $pdo = new PDO(
        "$driver:host=$host; dbname=$db_name; charset=$charset", 
        $db_user, $db_pass, $options
    );
}catch (PDOException $i){
    // die("Ошибка подключения к базе данных");
    echo $i->getMessage();
}

?>