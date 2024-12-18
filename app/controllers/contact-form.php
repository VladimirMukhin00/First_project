<?php

    // получим данные с формы
    $email = $_POST['email'];
    $message = $_POST['message'];

    // обработка полученных данных
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);   // преобразование символов в сущности (мнемоники)

    
    $email = urldecode($email);
    $message = urldecode($message);         // декодирование URL

    
    $email = trim($email);
    $message = trim($message);             // удаление пробелов с обеих сторон

    // отправляем данные себе на почту

    if (mail("vladimir.zed30@gmail.com",
             "Новое письмо с сайта",
             "Почта отправителя: ".$email."\n".
             "Сообщение: ".$message."\r\n")
    ){
        echo ("Письмо успешно отправлено!");
    }
    else {
        echo ("Ошибки при заполнении формы! Проверьте данные...");
    }