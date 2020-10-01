
<div class="comments">

    <form style="max-width: none; padding: 1em 0 1em 0; border: none " action="com.php">
        <input style="width: 80%; width: calc(100% - 30px); margin: 20px 15px 10px 15px;" name="comment" id="coment" placeholder="Оставьте свой комментарий...">

        <div class="wrap_button" style="margin-bottom: 20px;">
<!--            <div class="button button_signIn" onClick="sendDataComment()" class="login-btn">Опубликовать</div>-->
            <input style="margin-top: 0px;" onClick="sendDataComment()" class="button button_signIn" value="Опубликовать" type="submit" method="post">
        </div>
    </form>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
    <h3>Name User</h3>
    <p>Text comments fidfdf fdgsdlgdlglf gdgjdgdlsgdsglg sdjgsdgsdgl sdgjdslgsdg gdgl gfdglgl lgflg lgf</p>
</div>
<style>
    .comments h3 {
        margin-bottom: 5px;
    }
</style>

<script type="text/javascript">

    function sendDataComment() {

    }
</script>



<?php

$id_article = $_POST["id_article"];
$comment_text = $_POST["comment"];

if ($_COOKIE["sessionkey"]) {
    include "connect.php";
    // $name = $_COOKIE['full_name'];
    $sessionkey = $_COOKIE["sessionkey"];
    $name = $_COOKIE["name"];
    $id_user = $_COOKIE["sessionname"];

//        $resUser = $mysqli->query("SELECT sessionkey, id_user FROM users WHERE sessionkey = '$sessionkey' AND id_user = '$sessionname'");
//        $rowUser = $resUser->fetch_assoc();
    $stmt = $mysqli->prepare("SELECT sessionkey, block FROM users WHERE id_user = ?");
    $stmt->bind_param("s", $id_user);
    $stmt->execute();
    $res = $stmt->get_result();
    $rowUser = $res->fetch_assoc();

    if ( $rowUser['block'] == '1' ) { die( "This number is blocked! Contact support." ); };

    if ($rowUser['sessionkey'] == $sessionkey) {
        $stmt2 = $mysqli->prepare("SELECT comments_Vjd7q3 FROM article WHERE id_article = ?");
        $stmt2->bind_param("s", $id_article);
        $stmt2->execute();
        $res = $stmt2->get_result();
        $rowArticle = $res->fetch_assoc();

        $str = $rowArticle['comments_Vjd7q3'];
        $arr = json_decode($str);

        $arr2 = [];
        $arr2[] = strval($name);
        $arr2[] = strval($comment_text);
        $arr2[] = date("Y-m-d");
//        $arr2[] = date("Y-m-d H:i:s");
        $arr2[] = intval($id_user);
        array_unshift($arr, $arr2);
        $str2 = json_encode($arr);

        $stmt2 = $mysqli->prepare("UPDATE `article` SET `comments_Vjd7q3` = ? WHERE `article`.`id_article` = ?");
        $stmt2->bind_param("ss", $str2, $id_article);
        $stmt2->execute();
    }
};
echo $id_article;
echo $comment_text;

$comments = [['User Name', 'Text coments', '2020-09-29', '29'], ['User Name2', 'Text coments2', '2020-09-29', '29'],['User Name3', 'Text coments3', '2020-09-29', '29'], ['User Name4', 'Text coments4', '2020-09-29', '29']];
foreach ($comments as &$comment) {
    echo '<h3>' . $comment[0] . '</h3><p>' . $comment[1] . '</p><div class="author">' . $comment[2] . '</div>';
}

?>







<div id="mc-container"></div>

    cackle_widget = window.cackle_widget || [];
cackle_widget.push({widget: 'Comment', id: 75097});
(function() {
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>


<script>
    // ДОНАСТРОЙКА КОМЕНТАРИЕВ cackle_widget
    if (condition) {
        // Скриваем поле ввода есле не авторизован
        document.getElementsByClassName('mc-form')[0].style.display = 'none';

        // Скриваем Имя и заполняем
        document.getElementsByClassName('mc-anonym-name')[0].setAttribute("value", "ddd");
        document.getElementsByClassName('mc-p')[0].style.display = 'none';

        // Скриваем email и заполняем
        document.getElementsByClassName('mc-anonym-email')[0].setAttribute("value", "nomail@mail.com");
        document.getElementsByClassName('mc-anonym-email')[0].style.display = 'none';

        document.getElementsByClassName('mc-anonym-login')[0].innerHTML = 'Опубликовать';
    }

    // Скриваем ненужные елементы
    document.getElementsByClassName('mc-menu')[0].getElementsByClassName('mc-grid-xs4')[0].style.display = 'none';
    document.getElementById('mc-link').setAttribute("style", "display: none !important");
    // document.getElementsByClassName('mc-auth-social')[0].style.display = 'none';
    // document.getElementsByClassName('mc-comment-footer')[0].style.display = 'none';
</script>

<style>
    .mc-comment-footer {
        display: none !important
    }

    .mc-anonym-email {
        display: none !important
    }
    .mc-authbox .mc-hide{
        display: block !important
    }
</style>