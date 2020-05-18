<?php 
    session_start(); 
    include "header.php";
?>
<section class="container">
  <form  action="/authphp.php" method="post">
	<!-- <label>Логин</label>
	<input type="text" name="login" placeholder="Введите свой логин"> -->
	<label>Телефон</label><br>
	<input type="tel" name="tel" placeholder="+38 098 765 43 21"><br>
	<label>Пароль</label><br>
	<input type="password" name="password" placeholder="Введите пароль"><br>
	<button class="button button_signIn" type="submit" class="login-btn">Войти</button>
</form>
<a href="register.php">
    <div class="button button_signIn">Register</div>
</a>
</section>
<?php include "footer.php" ?>