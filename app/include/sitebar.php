<?php
    // include "app/controllers/categories.php";
    // require_once "app/controllers/categories.php";
?>


<div class="sidebar col-md-3 col-12">

          <div class="section search">
            <h3>Поиск по сайту</h3>
            <form action="<?= BASE_URL . 'search.php'?>" method="post">
              <input type="text" name="search-term" class="text-input" placeholder="Введите запросик...">
            </form>
          </div>

          <div class="section topics">
            <h3>Разделы</h3>
            <ul>
              <?php foreach($categories as $key => $category): ?>
              <li><a href="<?=BASE_URL . 'category.php?id=' . $category['id']; ?>"><?=$category['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>

        </div>