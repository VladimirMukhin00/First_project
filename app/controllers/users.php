<?php
include("app/database/db.php");

$isSubmit = false;
$errMsg = '';

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
    echo 'GET';
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
