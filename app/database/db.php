<?php

// session_start();

require('connect.php');

// Вывод удобочитаемой информации
function tt($value){
    echo '<pre>';
    print_r(($value)); 
    echo '<pre>';
    exit();
}

// Проверка выполнения запроса к БД
function dbCheckError($query){  
    $errInfo = $query->errorInfo();     
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запрос на получение данных c одной таблицы
function selectAll($table, $params = []){  //вывод всей таблицы (Ф1)
    global $pdo;
    $sql = "SELECT * FROM $table"; // сам запррос
    
    if(!empty($params)){    // проверка есть ли на вход параметры
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){  // проверка на число
                $value = "'".$value. "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Запрос на получение одной строки c выбранной таблицы
function selectOne($table, $params = []){  //вывод всей таблицы (Ф1)
    global $pdo;
    $sql = "SELECT * FROM $table"; // сам запррос
    
    if(!empty($params)){    // проверка есть ли на вход параметры
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){  // проверка на число
                $value = "'".$value. "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    // $sql = $sql . " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch(); // feath - вывод одной строки
}


// Запись в таблицу БД
function insert($table, $params){
    global $pdo;

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'$value'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);
    $query->execute();   //$query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();  // возвращаем id записи
}

// Обновление строки в таблице
function update($table, $id,  $params){
    global $pdo;

    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $str = $str . $key . " = '$value'";
        }else {
            $str = $str .", " . $key . " = '$value'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";

    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);
    $query->execute();   //$query->execute($params);
    dbCheckError($query);
}

// Обновление строки в таблице
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id =". $id;

    $query = $pdo->prepare($sql);
    $query->execute();   //$query->execute($params);
    dbCheckError($query);
}


// Выборка статей с автором в админку
function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;

    $sql = "SELECT
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_category,
    t1.created_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

    $query = $pdo->prepare($sql);
    $query->execute();   //$query->execute($params);
    dbCheckError($query);
    return $query->fetchAll();
}
// $params = [
//     'admin' => 1,
//     'username' => 'same'
// ];

// $arrData = [
//     'admin' => '0',
//     'username' => '123673486646',
//     'email' => 'r@hj8787yyre.ru',
//     'password' => '1234324343fhur78878686uyfh',
//     'created ' => '2021-01-11 00:00:01'
// ];

// $param = [
//     'admin' => '1'
    
// ];
// tt(selectAll("users", $params)); // (Ф1)
// tt(selectOne('users'));
// insert("users", $arrData);
// update('users', '2', $param);
// delete('users', 8);

