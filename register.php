<?php 
session_start(); 
include "header.php";
?>
<section class="container">
<form  action="/reg.php" method="post">
  <!-- <form  action="/auth.php" method="post"> -->
	<!-- <label>Логин</label>
	<input type="text" name="login" placeholder="Введите свой логин"> -->
	<label>Телефон</label><br>
	<input type="tel" name="tel" placeholder="+38 098 765 43 21"><br>
	<label>Пароль</label><br>
	<input type="password" name="password" placeholder="Введите пароль"><br>
	<label>ФИО</label><br>
	<input type="text" name="full_name" placeholder="Введите свое полное имя"><br>
	<button class="button button_signIn" type="submit" class="register-btn">Зарегистрироваться</button>
	<?php  ?>
</form>
</section>
<?php include "footer.php" ?>
