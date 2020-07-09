<?php session_start();

	include "header.php";
	include "connect.php";

	if ($_COOKIE["sessionkey"]) {

		// $name = $_SESSION['full_name'];
		$sessionkey = $_COOKIE["sessionkey"];
		$resUser = $mysqli->query("SELECT * FROM users WHERE sessionkey = '$sessionkey'");
		$rowUser = $resUser->fetch_assoc();
		$str = $rowUser['article'];
		$arr = json_decode($str);
		?>
		<section class="container container_index row">
		<?php
		foreach ($arr as &$value) {
			$resArt = $mysqli->query("SELECT * FROM `article` WHERE `id_article` = $value");
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
		<?php
	} ;
	// else {
	// 	$sessionkey = $_COOKIE["sessionkey"];

	// 	$res = $mysqli->query("SELECT * FROM users WHERE sessionkey = '$sessionkey'");
	// 	$row = $res->fetch_assoc();

	// 	$sessionname = $row['name'];
	// 	if ($row['sessionkey'] == $sessionkey) {

	// 		$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`, `category`) VALUES ('$linc', '$title','$body','$sessionname','$description','$keywords','$img','$img_head','$category')");
	// 		$id_article = $mysqli->insert_id;

	// 		$str = $row['article'];
	// 		$arr = json_decode($str);
	// 		$arr[] = $id_article;
	// 		$str2 = json_encode($arr);
	// 		$mysqli->query("UPDATE `users` SET `article` = '$str2' WHERE sessionkey = '$sessionkey'");
	// 	}
	// };
	// <div class="adminBtn" > <a class="button button_signIn" href="#">Redact</a><a class="button button_signIn" href="#">Delete</a></div>
include "footer.php" ?>
<?php 
$dssdsds = <<<'ASDFG'
<a class='card' href='<?php echo $rowArt['linc'] ?>.php'>
<div class='cardDiv' style='background-image:url(<?php echo $rowArt['img'] ?>);'>
	<div class='adminBtn'>
		<a class='button button_signIn' href='#'>Redact</a>
		<a class='button button_signIn' href='#'>Delete</a>
	</div>
	<h2 class='card_text'><?php echo $rowArt['title'] ?> </h2>
</div>
</a>
ASDFG;
?>