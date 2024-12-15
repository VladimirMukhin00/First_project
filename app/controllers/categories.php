<?php

include('../../app/database/db.php');

$errMsg = '';
$categories = selectAll('categories');

$id = '';
$name = '';
$description = '';


// Форма создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-create'])){
    
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Название категории должено быть более 2-х символов";
    }else{
        $existence = selectOne('categories', ['name' => $name]);
        
        if ($existence){
            $errMsg = 'Такая категория уже есть...';
        }else{
            $category = [
                'name' => $name,
                'description' => $description   // отправка в БД
            ];
        
            $id = insert('categories', $category);
            $category = selectOne("categories", ['id' => $id]);
            echo "Была создана категория с id = " . $id;
            
            header('location: ' . BASE_URL . 'admin/categories/index.php');
        }
    }

} else{
    echo 'GET';
    $name = '';
    $description = '';
}

// Редактирование категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $category = selectOne('categories', ['id' => $id]);
    $id = $category['id'];
    $name = $category['name'];
    $description = $category['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Название категории должено быть более 2-х символов";
    }else{
            $category = [
                'name' => $name,
                'description' => $description   // отправка в БД
            ];
        
            $id = $_POST['id'];
            $category_id = update('categories', $id, $category);
            echo "Обновилась категория с id = " . $id;
            
            header('location: ' . BASE_URL . 'admin/categories/index.php');
        }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

    $id = $_GET['del_id'];
    delete('categories',$id);
    header('location: ' . BASE_URL . 'admin/categories/index.php');
}