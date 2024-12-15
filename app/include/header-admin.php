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
                <li>
                  <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['login']; ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo BASE_URL . "logout.php"?>">Выход</a> 
                </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>