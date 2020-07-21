<?php

include "connect.php";

global $title;            $title = "";
global $description;      $description = "";
global $keywords;         $keywords = "";
global $menu_item_active; $menu_item_active = true;

include "header.php" ?>

    <section class="container container_index row">
        <div class="categoryWrap">
            <a href="index.php?category=money" class="category">Money</a>
        <?php
        $query =  "SELECT * FROM article WHERE category='Money' LIMIT 6";
        if ($result = $mysqli->query($query)) {
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

    <section class="container container_index row">
        <div class="categoryWrap">
            <a href="index.php?category=programs" class="category">Programs</a>
        <?php
        $query =  "SELECT * FROM article WHERE category='Programs' LIMIT 6";
        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <a class='card' href='<?php echo $row['linc'] ?>.php'><div class='cardDiv' style="background-image:url('<?php echo $row['img'] ?>');"><h2 class='card_text'><?php echo $row['title'] ?> </h2></div></a>

            <?php }

            $result->free();
        }
        ?>
            <div class="w-100"></div>
            <a href="index.php?category=programs" style="margin:20px auto;display: block;" class="button button_signIn"">Больше Programs</a>
        </div>
    </section>
<?php include "footer.php" ?>