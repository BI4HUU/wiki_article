<?php
	global $title;
	global $description;
	global $keywords;
	include "header.php";
?>
<section class="container">
<form>
	<!-- <form  action="/auth.php" method="post"> -->
	<!-- <label>Логин</label>
	<input type="text" name="login" placeholder="Введите свой логин"> -->
	<!-- <label>Телефон</label><br> -->
	<input type="tel" id="tel" name="tel" placeholder="+38 098 765 43 21"><br>
	<div class="wrap_button" style="margin-top: 10px;" >

		<div class="button button_signIn register-btn" onClick="sendData()">Проверить</div>
		<input style="width: 120px; margin-left: 15px; margin-top: 20px;" name="confirm" id="confirm" placeholder="Code in SMS">

	</div>
	<!-- <label>Пароль</label><br> -->
	<!-- <input id="password" type="password" name="password" placeholder="Введите пароль"><br> -->
	<!-- <label>ФИО</label><br> -->
<!--	<input id="full_name" type="text" name="full_name" placeholder="Введите свое полное имя"><br>-->
	<div id="wrap_button">
		<div class="button button_signIn" onClick="sendDataReg()" class="register-btn">Войти</div>
<!--		<a href="auth.php">-->
<!--				<div style="border: 2px #bbb solid;color: #bbb;" class="button button_signIn">Вход</div>-->
<!--		</a>-->
	</div>
	<?php  ?>
</form>
<!--<div class="FB">-->
<!--    <fb:login-button-->
<!--        scope="public_profile,email"-->
<!--        onlogin="checkLoginState();">-->
<!--    </fb:login-button>-->
<!--</div>-->
    <div style="text-align: center;" id="mesegesCalbeack"></div>
    <div style="text-align: center; color: #444444" class="info">Первый раз "Войти" работает как регистрация!</div>
</section>


<script>

// 	window.fbAsyncInit = function() {
// 		FB.init({
// 			appId      : '2973051456096728',
// 			cookie     : true,
// 			xfbml      : true,
// 			version    : 'v7.0'
// 		});
//
// 		FB.AppEvents.logPageView();
//
// 	};
//
// 	(function(d, s, id){
// 		var js, fjs = d.getElementsByTagName(s)[0];
// 		if (d.getElementById(id)) {return;}
// 		js = d.createElement(s); js.id = id;
// 		js.src = "https://connect.facebook.net/en_US/sdk.js";
// 		fjs.parentNode.insertBefore(js, fjs);
// 	}(document, 'script', 'facebook-jssdk'));
//
// FB.ui({
// 	method: 'share',
// 	href: 'https://developers.facebook.com/docs/'
// }, function(response){});
//
// FB.login(function(response) {
// 	if (response.authResponse) {
// 		console.log('Welcome!  Fetching your information.... ');
// 		FB.api('/me', function(response) {
// 			console.log('Good to see you, ' + response.name + '.');
// 		});
// 	} else {
// 		console.log('User cancelled login or did not fully authorize.');
// 	}
// });
//
// function checkLoginState() {
// 	FB.getLoginStatus(function(response) {
// 		if(response.status == 'connected'){
// 			const XHRfb = new XMLHttpRequest();
// 			XHRfb.open( 'POST', 'fb.php' );
// 			XHRfb.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
// 			XHRfb.send( `&token=${ response.authResponse.accessToken }&id=${ response.authResponse.userID }` );
// 			// document.location.href = "/create.php";
// 		};
// 	});
// }
</script>
<!--<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>-->

<script>

	function sendData() {

		var tel = document.getElementById("tel").value;
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'reg1.php' );
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
        var full_name = '';
        const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'reg.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `&tel=${ tel }&confirm=${ confirm }&full_name=${ full_name }` );
		XHR.responseType = 'text';
		XHR.onload = function() {
            if (XHR.response === "False code!.") {
                document.getElementById('mesegesCalbeack').innerText = XHR.response;
            } else {
                document.location.href = "/index.php";
            }
		};
}
</script>


<?php include "footer.php" ?>
