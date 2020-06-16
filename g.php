<?php
	include "connect.php";
	$query =  "SELECT * FROM article WHERE 1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();

	global $title;       $title = "";
	global $description; $description = "";
	global $keywords;    $keywords = "";

	include "header.php";

$text1 = <<<'HEREDOC'
<?php
	include "connect.php";
	$query =  "SELECT * FROM article WHERE id_article=
HEREDOC;

$text2 = <<<'HEREDOC2'
";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();

	global $title;
	$title = $row['title'];
	global $description;
	global $keywords;

	include "header.php";
	echo ("<section class='container_article'><div class='head'><img src='" . $row['img_head'] . "'/><div class='blekFone'><h1>" . $row['title'] . "</h1></div></div><p>" . $row['body'] . "</p><div class='author'>" . $row['name'] . "  " . $row['date'] . "</div><hr>");

	$result->free();

?>
</section>
<?php include "footer.php" ?>
HEREDOC2;
while ($row = $result->fetch_assoc()) {
	$nameFile = $row['linc'] . ".php";
	$fp = fopen($nameFile, 'w');

	$test = fwrite($fp, $text1 . $row['id_article'] . $text2);
	fclose($fp);
}

include "header.php";

?>
<h1>Thank! The article will be added after verification.</h1>

