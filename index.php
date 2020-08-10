<?php
//	session_start();
    $WHERE = 1;

	if($_GET["logout"]){
//		session_abort ();
		setcookie("sessionkey", 'false', time()-1);
        setcookie("sessionname", 'false', time()-1);
        setcookie("name", 'false', time()-1);
		header('Location: /index.php');
		exit;
	};

    if($_GET["category"] == 'programs'){
        $WHERE = "category = 'Programs'";
    };

    if($_GET["category"] == 'money'){
        $WHERE = "category = 'Money'";
    };

    if($_GET["category"] == 'other'){
        $WHERE = "category = 'Other'";
    };

	include "connect.php";

	global $title;       $title = "";
	global $description; $description = "";
	global $keywords;    $keywords = "";

	include "header.php" ?>

<section class="container container_index row">
<?php
$query =  "SELECT * FROM article WHERE $WHERE ORDER BY like_8f6b4n5m6 DESC";
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