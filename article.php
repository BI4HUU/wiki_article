<?php 
session_start();

include "connect.php";

$query =  "SELECT * FROM article WHERE `id`='$_GET["id"]'";

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			echo ("<h1>" . $row['title'] . "</h1><p>" . $row['body'] . "</p><div class='author'>" . $row['name'] . "  " . $row['date'] . "</div>
			<hr>");
		}

	$result->free();
}
?>
</section>
<?php include "footer.php" ?>



<?php 
while ($row = $result->fetch_assoc()) {
		echo  '<h1>' . $row["title"] . '</h1>';
		echo  $row["description"];
		echo  $row["keywords"];
		echo  $row["body"];
		echo  $row["name"];
		echo  '<hr>';

	}
?>
