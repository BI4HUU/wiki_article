<?php
//session_start();

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
