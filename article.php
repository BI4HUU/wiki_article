<?php 
$connect = new mysqli("127.0.0.1", "root", "root", "article");
$result = $connect->query("SELECT * FROM `article` WHERE 1"); 
include "header.php" ?>

<section style="container">
    
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

</section>
<?php include "footer.php" ?>