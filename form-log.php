<?php include("path.php");
      include("app/controllers/users.php");
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>History of the World</title>
  </head>
  <body>
    
    <!--Шапка-->
    <?php
    include("app/include/header.php"); // подключение шапки
    ?>
    <!--Шапка (конец)-->

    <!--END HEADER-->
    <!--FORM-->
    <div class="container reg_form">
      <form class="row row justify-content-center" method="post" action="form-log.php">
        <h2 class="col-12">Войти в личный кабинет</h2>
          <div class="mb-3 col-12 col-md-4 error">
            <p><?=$errMsg?></p>  
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4">
              <label for="formGroupExampleInput" class="form-label">Email</label>
              <input type="email" name="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email...">
          </div>
          <div class="w-100"></div> <!--Принудительный переход на новую строку-->
          
          <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4 but-reg">
            <button type="submit" name="button-log" class="btn btn-primary">Войти</button>
            <a href="form-reg.php">Регистрация<img src="assets/images/free-icon-arrow-right-1549454.png"></a>
          </div>
      </form>
    </div>

    <!--END FORM-->

    <!--Фуутер-->
    <?php
    include("app/include/footer.php"); // подключение подвальчика
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