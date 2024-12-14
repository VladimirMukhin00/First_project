<?php
    // include("app/controllers/contact-form.php");
?>

<div class="footer container-fluid">
      <div class="footer-content container">
        <div class="row">
          <div class="footer-section about col-md-4 col-12">
            <h3 class="logo-text">History of the World</h3>
            <p>
              History of the World - это блог сделанный с целью информационного
              просвещения человечества по предмету "История".
            </p>
            <div class="contact">
              <!-- <span><i class="fas fa-phone"> &nbsp; +79243317792</i></span> -->
              <span><i class="fas fa-envelope"> &nbsp; vladimir.zed30@gmail.com</i></span>
            </div>
            <div class="socials">
              <a href="https://vk.com/id519143923"><i class="fab fa-vk"></i></a>
            </div>
          </div>

          <div class="footer-section links col-md-4 col-12">
            <h3>Ссылочки</h3>
            <br>
            <ul>
              <a href="<?php echo BASE_URL?>">
                <li>Главная</li>
              </a>
              <a href="">
                <li>оооооооооооооооо</li>
              </a>
              <a href="">
                <li>Только скажи куда</li>
              </a>
              <a href="https://github.com/VladimirMukhin00/history-of-the-world.git">
                <li>Репозиторий GitHub</li>
              </a>
              <a href="about.php">
                <li>О сайте</li>
              </a>
            </ul>
          </div>

          <div class="footer-section contact-form col-md-4 col-12">
            <h3>Обратная связь</h3>
            <br>
            <form action="footer.php" method="post">
              <input type="email" name="email" class="text-input contact-input" placeholder="Введите ваш email">
              <textarea rows="4" name="message" class="text-input contact-input" placeholder="Введите сообщение"></textarea>
              <button type="submit" class="btn btn-big contact-btn">
                <i class="fas fa-envelope"></i>
                Отправить
              </button>
            </form>
          </div>

        <div>

        <div class="footer-bottom container-fluid">
          &copy; HistoryWorld.com | Designed by Vladimir_Mukhin
        </div>
      </div>
    </div>