<header class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-4 iii">
            <h1>
              <a href="<?php echo BASE_URL?>">History of the World</a>
            </h1>
          </div>
          <nav class="col-8">
            <ul>
              <li><a href="<?php echo BASE_URL?>">Главная</a> </li>
              <li><a href="http://localhost/dinamic-site/animals/index.html">Галерея</a> </li>
              <li><a href="about.php">О сайте</a> </li>
              
              <li>
                <?php if (isset($_SESSION['id'])): ?>  <!--Сессия-->
                  <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['login']; ?>
                  </a>
                  <ul>
                    <?php if ($_SESSION['admin']): ?>
                        <li><a href="admin/posts/index.php">Админ панель</a> </li>  <!-- скрытие админки-->
                    <?php endif; ?>
                    <li><a href="<?php echo BASE_URL . "logout.php"?>">Выход</a> </li>
                  </ul>
                <?php else: ?>
                  <a href="<?php echo BASE_URL . "form-log.php"?>">
                    <i class="fa fa-user"></i>
                    Войти
                  </a>
                  <ul>
                    <li><a href="<?php echo BASE_URL . "form-reg.php"?>">Регистрация</a> </li>
                  </ul>
                <?php endif; ?>
                
              </li>
            </ul>
          </nav>
        </div>

      </div>
    </header>