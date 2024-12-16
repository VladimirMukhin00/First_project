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
    <!--Куки-->

    <div class="cookie-block">
    <p>Можно взять ваши кукиес?</p>
    <button class="ok">Конечно</button>
    <button class="no">Нельзя!</button>
    </div>
    <script src="assets/js/scripts.js"></script>
    
    <!--Куки (конец)-->

    <!--Шапка-->
    <?php
    include("app/include/header.php"); // подключение шапки
    ?>
    <!--Шапка (конец)-->
    
    <!--Блок карусели (начало)-->
    <div class="container">
      <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
      </div>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/image1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="about.php">О сайте</a></h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/image2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="">Второй слайдик!</a></h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/image3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="">Третий слайдик!вау</a></h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/image6.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="">Четвертый слайдик!</a></h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/image5.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="">Пятый слайдик!шок-контент</a></h5>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!--Блок карусели (конец)-->
    <!--Основная часть сайта под каруселькой (начало)-->
    <div class="container">
      <div class="content row">
        <!--Главный контент-->
        <div class="main-content col-md-9 col-12">
          <h2>Последнии публикации</h2>

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/image4.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
                <h3>
                    <a href="single.php">Не стоит прогибаться под изменчивый мир</a>
                </h3>
                <i class="far fa-user"> Владимир Мухин</i>
                <i class="far fa-calendar"> 31 октября, 2024</i>
                <p class="previem-text">
                  Папампапам парамапам вот так вот парампампам турум пум пум.
                  Вот этот его а тот его оооууууу ужасс как же можно так.
                  Ну короче вы поняли... (сайтик ещё совсем маленький и только учится делать 
                  свои первые шажочки:)

                </p>
            </div>
          </div>

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/image4.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
                <h3>
                    <a href="single.php">Не стоит прогибаться под изменчивый мир</a>
                </h3>
                <i class="far fa-user"> Владимир Мухин</i>
                <i class="far fa-calendar"> 31 октября, 2024</i>
                <p class="previem-text">
                  Папампапам парамапам вот так вот парампампам турум пум пум.
                  Вот этот его а тот его оооууууу ужасс как же можно так.
                  Ну короче вы поняли... (сайтик ещё совсем маленький и только учится делать 
                  свои первые шажочки:)

                </p>
            </div>
          </div>
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