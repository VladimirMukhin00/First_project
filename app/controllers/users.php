<?php

include("..\\..\\app\\database\\db.php");
// include SITE_ROOT . "/app/database/db.php";
// echo __DIR__; // Покажет текущую директорию
// echo realpath('../database/db.php'); // Покажет полный путь к файлу или `false`, если файл не найден


$isSubmit = false;
$errMsg = '';

$users = selectAll('users');

// Форма регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === '' || $passS === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS){
        $errMsg = "Пароли должны совпадать...";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        
        if ($existence){
            $errMsg = 'Пользователь с таким email уже есть...';
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);

            $post = [
                'admin' => $admin,
                'username' => $login,   // отправка в БД
                'email' => $email,
                'password' => $pass
            ];
        
            $id = insert('users', $post);
            $last_row = selectOne("users", ['id' => $id]);
            echo "Был создан пользователь с id = " . $id;
            
            $user = selectOne('users', ["id" => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if($_SESSION['admin']){
                header('location: ' . BASE_URL . "admin/posts/index.php");
            }else{
                header('location: ' . BASE_URL); // редирект юзера на главную страницу
            }
            
            $isSubmit = true;
        }
    }

} else{
    // echo 'GET';
    $login = '';
    $email = '';
}

// Форма входа в личный кабинет
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence = selectOne("users", ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])){

            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];

            if($_SESSION['admin']){
                header('location: ' . BASE_URL . "admin/posts/index.php");
            }else{
                header('location: ' . BASE_URL); // редирект юзера на главную страницу
            }
        }else{
            $errMsg = "Почта или пароль введены неверно!";
        }
    }
    
}
    // $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);




// Форма создания пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === '' || $passS === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS){
        $errMsg = "Пароли должны совпадать...";
    }else{
        $existence = selectOne('users', ['email' => $email]);

        if ($existence){
            $errMsg = 'Пользователь с таким email уже есть...';
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,   // отправка в БД
                'email' => $email,
                'password' => $pass
            ];
        
            $id = insert('users', $user);
            $user = selectOne("users", ['id' => $id]);
            echo "Был создан пользователь с id = " . $id;
            header('location: ' . BASE_URL . "admin/users/index.php");
            // $user = selectOne('users', ["id" => $id]);

            // $_SESSION['id'] = $user['id'];
            // $_SESSION['login'] = $user['username'];
            // $_SESSION['admin'] = $user['admin'];

            // if($_SESSION['admin']){
            //     header('location: ' . BASE_URL . "admin/posts/index.php");
            // }else{
            //     header('location: ' . BASE_URL); // редирект юзера на главную страницу
            // }
            
            // $isSubmit = true;
        }
    }

} else{
    // echo 'GET';
    $login = '';
    $email = '';
}


// Редактирование пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){

    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $login = $user['username'];
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])){
    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $admin = isset($_POST['admin']) ? 1: 0;
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    
    $errMsg = [];

    if($login === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS){
        array_push($errMsg, "Пароли должны совпадать...");
    }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
        $user = [
                'admin' => $admin,
                'username' => $login,   // отправка в БД
                // 'email' => $email, нельзя редактировать
                'password' => $pass
        ];

    
        $user = update('users', $id,$user);
        echo "Была обновлена статья <- " . $title . " ->";
        
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }

} else{
    // echo 'GET';
    // $login = '';
    // $email = '';
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    delete('users',$id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}