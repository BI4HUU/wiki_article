<?php
	session_start();
	include "connect.php";

	global $title;       $title = "";
	global $description; $description = "";
	global $keywords;    $keywords = "";

	include "header.php" ?>
	
<section class="container container_index row">
<?php
$query =  "SELECT * FROM article WHERE 1";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
		?>
			<a class='card' href='<?php echo $row['linc'] ?>.php'><div class='cardDiv' style="background-image:url('<?php echo $row['img'] ?>');"><h2 class='card_text'><?php echo $row['title'] ?> </h2></div></a>
		<?php }

	$result->free();
}
?>

</section>
<?php include "footer.php" ?>