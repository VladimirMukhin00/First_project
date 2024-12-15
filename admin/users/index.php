<?php session_start(); 
        include "../../path.php";
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/f4f71e6e13.js" crossorigin="anonymous"></script>

    <!-- Custom Styling-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>History of the World</title>
  </head>
  <body>
    <!--Шапка-->
    <?php
    include("../../app/include/header-admin.php"); // подключение шапки
    ?>
    <!--Шапка (конец)-->
    <!--Основной контент-->
    <div class="container">
        <?php include('../../app/include/sitebar-admin.php'); ?> <!--сайтбар-->
            <div class="posts col-9">
                <div class="buttom row">
                    <a href="<?php echo BASE_URL . 'admin/users/create.php';?>" class="col-3 btn btn-success">Создать пользователя</a>
                    <a href="<?php echo BASE_URL . 'admin/users/index.php';?>" class="col-3 btn btn-primary">Управление пользователями</a>
                </div>
                <div class="row tabl">
                    <div class="row title-table">
                        <h2 class="tt">Пользователи</h2>
                        <div class="col-1">ID</div>
                        <div class="col-5">Логин</div>
                        <div class="col-2">Роль</div>
                        <div class="col-4">Действия</div>
                    </div>
                    <div class="row post">
                        <div class="id col-1">1</div>
                        <div class="title col-5">Владимир</div>
                        <div class="autor col-2"><a href="#">Admin</a></div>
                        <div class="red col-2"><a href="#">edit</a></div>
                        <div class="del col-2"><a href="#">delete</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Основной контент(конец)-->
    <!--Фуутер-->
    <?php
    include("../../app/include/footer.php"); // подключение подвальчика
    ?>
    <!--Фуутер (конец)-->

    <!-- Необязательный JavaScript; выберите один из двух! -->

    <!-- Вариант 1: пакет Bootstrap с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Вариант 2: отдельные JS для Popper и Bootstrap -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>