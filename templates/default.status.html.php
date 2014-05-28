<div class="inside status">
  <?php 
    if (isset($_SESSION['username'])) {
      ?>
      Zalogowany jako <a href="?v=user&a=edit"><?php echo $_SESSION['username'] ?></a>. <a href="?v=user&a=logout">Wyloguj się</a>
      <?php
    } else {
      ?>
      Niezalogowany. <a href="?v=user&a=login">Zaloguj się</a> lub <a href="?v=user&a=register">zarejestruj</a>
      <?php
    }
  ?>
</div>

