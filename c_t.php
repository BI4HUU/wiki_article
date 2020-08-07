<?php

include "connect.php";

global $title;            $title = "";
global $description;      $description = "";
global $keywords;         $keywords = "";
global $menu_item_active; $menu_item_active = true;

include "header.php";
$stmt = $mysqli->prepare("SELECT * FROM article WHERE category= ? LIMIT 6") ?>

    <section class="container container_index row">
        <div class="categoryWrap">
            <a href="index.php?category=money" class="category">Money</a>
            <?php

            $var = "Money";
            $stmt->bind_param("s", $var );
            $stmt->execute();

            if ($result = $stmt->get_result()) {
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <a class='card' href='<?php echo $row['linc'] ?>.php'><div class='cardDiv' style="background-image:url('<?php echo $row['img'] ?>');"><h2 class='card_text'><?php echo $row['title'] ?> </h2></div></a>

                <?php }

                $result->free();
            }
            ?>
            <div class="w-100"></div>
            <a href="index.php?category=money" style="margin:20px auto;display: block;" class="button button_signIn"">Больше Money</a>
        </div>
    </section>

<?php include "footer.php" ?>