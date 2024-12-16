<?php
    include "app/controllers/categories.php";
?>


<div class="sidebar col-md-3 col-12">

          <div class="section search">
            <h3>Поиск по сайту</h3>
            <form action="index1.html" method="post">
              <input type="text" name="search-term" class="text-input" placeholder="Введите запросик...">
            </form>
          </div>

          <div class="section topics">
            <h3>Разделы</h3>
            <ul>
              <?php foreach($categories as $key => $category): ?>
              <li><a href=""><?=$category['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>

        </div>