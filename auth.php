<?php 
	session_start(); 
	include "header.php";
?>
<section class="container">
	<form >
		<!-- <label>Логин</label>
		<input type="text" name="login" placeholder="Введите свой логин"> -->
		<!-- <label>Телефон</label><br> -->
		<input type="tel" id="tel" placeholder="+38 098 765 43 21"><br>
		<!-- <label>Пароль</label><br> -->
		<div class="wrap_button" style="margin-top: 10px;" >
			<div class="button button_signIn register-btn" onClick="sendData()">Confirm</div>
			<input style="width: 120px; margin-left: 15px; margin-top: 20px;" name="confirm" id="confirm" placeholder="Code in SMS">
		</div><br>
		<div class="wrap_button">
			<div class="button button_signIn" onClick="sendDataReg()" class="login-btn">Войти</div>
			<a href="register.php">
				<div class="button button_signIn">Register</div>
			</a>
		</div>
	</form>
</section>

<script>

	function sendData() {

		var tel = document.getElementById("tel").value;
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'authphp1.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `tel=${ tel }` );
		XHR.responseType = 'text';
		XHR.onload = function() {
			document.getElementById('mesegesCalbeack').innerText = XHR.response;
		};
	}

	
	function sendDataReg() {

		var tel = document.getElementById("tel").value;
		var confirm = document.getElementById("confirm").value;
		// var password = document.getElementById("password").value;
		// var full_name = document.getElementById("full_name").value;

		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'authphp.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `&tel=${ tel }&confirm=${ confirm }` );
		XHR.responseType = 'text';
		XHR.onload = function() {
			if (XHR.response === "False password") {
				document.getElementById('mesegesCalbeack').innerText = XHR.response;
			} else {
				document.location.href = "/create.php";
			}
		};
	}
	</script>
<?php include "footer.php" ?>