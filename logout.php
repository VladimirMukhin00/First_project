<?php
include("path.php"); 

session_start();

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);

header('location: ' . BASE_URL); // редирект юзера на главную страницу