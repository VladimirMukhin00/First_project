<?php
include("app/database/db.php");

if(isset($_POST['login'])){   // обработчик формы регистрации
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
    $admin = 0;

    $post = [
        'admin' => $admin,
        'username' => $login,
        'email' => $email,
        'password' => $pass
    ];
    $id = insert('users', $post);
    $last_row = selectOne("users", ['id' => $id]);
    echo "Был создан пользователь с id = " . $id;
    
}