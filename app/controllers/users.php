<?php
include("app/database/db.php");

$isSubmit = false;
$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
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
                header('location: ' . BASE_URL . "admin/admin.php");
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
    
    // $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
