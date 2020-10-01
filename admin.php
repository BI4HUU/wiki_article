<?php
//session_start();

    $full_name = $_POST['full_name'];
	include "connect.php";

	if (!$_COOKIE["sessionkey"]) {
        header('Location: /register.php');
        setcookie("sessionkey", 'false', time()-1);
        setcookie("sessionname", 'false', time()-1);
        setcookie("name", 'false', time()-1);
        exit();
    };
        $sessionkey = $_COOKIE["sessionkey"];
        $sessionname = $_COOKIE["sessionname"];

        $stmt = $mysqli->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->bind_param("s", $sessionname );
        $stmt->execute();
        $resUser = $stmt->get_result();
		$rowUser = $resUser->fetch_assoc();

        if ( intval( $rowUser['false_password'] ) >= 5  ) {
            header('Location: /index.php');
            setcookie("sessionkey", 'false', time()-1);
            setcookie("sessionname", 'false', time()-1);
            setcookie("name", 'false', time()-1);
            exit();};

        if ( $rowUser['block'] == '1' ) {
            header('Location: /index.php');
            setcookie("sessionkey", 'false', time()-1);
            setcookie("sessionname", 'false', time()-1);
            setcookie("name", 'false', time()-1);
            exit();};

		$str = $rowUser['article'];
		$arr = json_decode($str);


    if ($rowUser['sessionkey'] == $sessionkey) {

        if ($full_name){
            $stmt4 = $mysqli->prepare("UPDATE `users` SET `name`= ? WHERE `id_user` = ?");
            $stmt4->bind_param("ss", $full_name,  $sessionname);
            $stmt4->execute();



            setcookie("name", $full_name, time()+999999999);
            die('nameok');

        };
        include "header.php";


        ?>


        <section class="container container_index row">
            <?php
            foreach ($arr as &$value) {
                $stmt2 = $mysqli->prepare("SELECT * FROM `article` WHERE `id_article` = ?");
                $stmt2->bind_param("s", $value );
                $stmt2->execute();
                $resArt = $stmt2->get_result();
                $rowArt = $resArt->fetch_assoc();

                $h = $rowArt['linc'];
                $img = $rowArt['img'];
                $titlea = $rowArt['title'];
                echo ("<div class='card'>
				<div class='cardDiv' style='background-image:url(\"$img\");'>
					<div class='adminBtn'>
						<a class='button button_signIn' href='$h.php'>See</a>
						<a class='button button_signIn' href='edit.php?edit=$value'>Redact</a>
						<a class='button button_signIn' href='delete.php?delete=$value'>Delete</a>
					</div>
					<h2 class='card_text'>$titlea</h2>
				</div>
			</div>");
            }
            ?>
        </section>
        <?php include "footer.php";
    } else {
        $false_password = $rowUser['false_password'];
        $false_password++;
        $stmt3 = $mysqli->prepare("UPDATE `users` SET `false_password`= ? WHERE `id_user` = ?");
        $stmt3->bind_param("ss", $false_password,  $sessionname);
        $stmt3->execute();
        header('Location: /register.php');
        setcookie("sessionkey", 'false', time()-1);
        setcookie("sessionname", 'false', time()-1);
        setcookie("name", 'false', time()-1);
        exit(); };

 ?>

<section class="container">
    <form>
        <div class="wrap_button" style="margin-top: 10px;" >
            <!--                    <input style="width: 120px; margin-left: 15px; margin-top: 20px;" name="confirm" id="confirm" placeholder="Code in SMS">-->
            <input id="full_name" type="text" name="full_name" placeholder="Введите свое имя"><br>
        </div>
        <div class="button button_signIn register-btn" onClick="sendData()">Изменить</div>
        <!--                <div id="wrap_button">-->
        <!--                    <div class="button button_signIn" onClick="sendDataReg()" class="register-btn">Зарегистрироваться</div>-->
        <!--                </div>-->
    </form>
</section>

<script>
function sendData() {

    var full_name = document.getElementById("full_name").value;
    // var password = document.getElementById("password").value;
    // var full_name = document.getElementById("full_name").value;
    const XHR = new XMLHttpRequest();
    XHR.open( 'POST', 'admin.php' );
    XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
    XHR.send( `&full_name=${ full_name }` );
    XHR.responseType = 'text';
    XHR.onload = function() {};
}
</script>