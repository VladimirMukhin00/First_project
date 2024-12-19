<?php session_start();
    include("path.php"); 
    // include("app/database/db.php");

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
    // $posts = selectAll('posts', ['status' => 1]);  // берем статьи с БД со статусом 1 - опубликованы
    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
    }
    ?>
    <!--Шапка (конец)-->
    
    <!--Основная часть сайта под каруселькой (начало)-->
    <div class="container">
      <div class="content row">
        <!--Главный контент-->
        <div class="main-content col-md-9 col-12">
          <h2>Результаты поиска</h2>

          <?php foreach($posts as $post): ?>   <!--ВЫВОД СОЗДАННЫХ СТАТЕЙ С АДМИНКИ-->
          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title'];?>" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
                <h3>
                    <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=substr($post['title'], 0, 120) . '...' ?></a>
                </h3>
                <i class="far fa-user"><?=$post['username'] ?></i>
                <i class="far fa-calendar"><?=$post['created_date'] ?></i>
                <div class="previem-text">
                <p class="previem-text">
                  <?=$post['content']?>
                </p> 
            </div>
          </div>
          <?php endforeach; ?>

        </div>

        <!--Сайтбар-контент-->
        <?php
        include("app/include/sitebar.php"); // подключение сайтбара
        ?>
        <!--Сайтбар-контент (конец)-->

      </div>
    </div>
    <!--Основная часть сайта под каруселькой (конец)-->
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