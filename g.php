<?php
	include "connect.php";
	include "bleack_list.php";
	$query =  "SELECT * FROM article WHERE 1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();

	global $title;       $title = "";
	global $description; $description = "";
	global $keywords;    $keywords = "";

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
	
    if($row['video_Mhfhd'] == ''){
		if($row['img_head'] == ''){
			$Head = "<div class='head'><img src='" . '/uploads/img_head.jpg' . "'/><div class='blekFone'><h1>" . $row['title'] . "</h1></div></div>";
		} else{
			$Head = "<div class='head'><img src='" . $row['img_head'] . "'/><div class='blekFone'><h1>" . $row['title'] . "</h1></div></div>";
		};
    } else{
		$Head = "<div class='head'><video src='" . $row['video_Mhfhd'] . "' id='video' autoplay='true' class='photoMain'></video><h1>" . $row['title'] . "</h1></div></div>";
	};
	

	include "header.php";
	echo ("<section class='container_article'>" . $Head . "<p>" . $row['body'] . "</p> <div class='bottom_article'> <div class='panel'> <div class='share'><div class='uSocial-Share' data-pid='860020081a5b9479d854655b8e6ac331' data-type='share' data-options='round-rect,style1,default,absolute,horizontal,size32,eachCounter0,counter0,nomobile' data-social='fb,vk,spoiler'></div></div> <div onclick='like(" . $row['id_article'] . ")' class='likeWrap'> <svg  id='like1' viewBox='0 -28 512.00002 512' xmlns='http://www.w3.org/2000/svg'><path d='m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0'/></svg> <svg id='like2' viewBox='0 -28 512.001 512' xmlns='http://www.w3.org/2000/svg'><path d='m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0'/></svg> </div> <div class='likeNumber'>" . $row['like_8f6b4n5m6'] . "</div> </div> <div class='author'>" . $row['name'] . "  " . $row['date'] . "</div></div>");

	$result->free();
?>
 
<div class="comments">

    <form id="comments_form" style="max-width: none; padding: 1em 0 1em 0; border: none " action="com.php" onsubmit="return false">
        <input style="width: 80%; width: calc(100% - 30px); margin: 20px 15px 10px 15px;" name="comment" id="coment" placeholder="Оставьте свой комментарий...">

        <div class="wrap_button" style="margin-bottom: 20px;">
<!--            <div class="button button_signIn" onClick="sendDataComment()" class="login-btn">Опубликовать</div>-->
            <input id="send_coment" style="margin-top: 0px;" onClick="sendDataComment()" class="button button_signIn" value="Опубликовать" type="submit" method="post">
        </div>
    </form>
<?php
	$comments = json_decode($row['comments_Vjd7q3']);
    foreach ($comments as &$comment) {
        echo '<h3>' . $comment[0] . '</h3><p>' . $comment[1] . '</p><div class="author">' . $comment[2] . '</div>';
    }
?>
</div>
</section>
<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
<script >

    setTimeout(function(){
		const XHR = new XMLHttpRequest();
		XHR.open( 'GET', 'see.php?id=
HEREDOC2;

$text3 = <<<'HEREDOC3'
' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send();
		XHR.onload = function() {};} , 1000);
		
    setTimeout(function(){
		const XHR = new XMLHttpRequest();
		XHR.open( 'GET', 'see.php?id2=
HEREDOC3;
$text4 = <<<'HEREDOC4'
&end=true' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send();
XHR.responseType = 'text';
XHR.onload = function() {};} , 185000);
    function sendDataComment() {
        var comment = document.getElementById("coment").value;
        
        const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'com.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `id_article=
HEREDOC4;


$text5 = <<<'HEREDOC5'
&comment=${comment}` );
		XHR.onload = function() {};
    }
    function getCookie(name) {
      let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
      return matches ? decodeURIComponent(matches[1]) : undefined;
    };
    var nameUser = getCookie('name');
    if(nameUser == undefined){
        var element = document.createElement('p');
        var coment = document.getElementById("coment");
        var my_div = document.getElementById("comments_form");
        element.innerHTML = "Чтобы оставить коментарий Войдите (Зарегистрируйтесь)!";
        comments_form.insertBefore(element, coment);
        coment.style.display = 'none';
        document.getElementById("send_coment").value = "Войти";
        document.getElementById("send_coment").setAttribute('onclick', 'document.location.href = "/register.php"');
    };
	var play = setInterval(function() {
		document.getElementById("video").play();
	}, 300);
</script>
<?php include "footer.php" ?>
HEREDOC5;


$bleack_list2 = [];
$bleack_list2 = $bleack_list2 + $bleack_list1;
while ($row = $result->fetch_assoc()) {
	$nameFile = $row['linc'] . ".php";
	$fp = fopen($nameFile, 'w');
	array_push($bleack_list2, $row['linc']);
	$test = fwrite($fp, $text1 . $row['id_article'] . $text2 . $row['id_article'] . $text3 . $row['id_article'] . $text4 . $row['id_article'] . $text5);
	fclose($fp);
}

$fp2 = fopen('bleack_list2.php', 'w');
$test2 = fwrite($fp2, '<?php $bleack_list2 = ' . json_encode($bleack_list2, JSON_UNESCAPED_UNICODE) . ';');
fclose($fp2);

include "header.php";

?>
<section class="container container_index row">
	<h1>Thank! The article will be added after verification.</h1>
</section>

<section class="container container_index row">
	<a href="/create.php"  rel="noreferrer noopener">
		<svg class="svg_files" id="svg_files" style="display: none" xmlns="http://www.w3.org/2000/svg" height="511pt" version="1.1" viewBox="-53 1 511 511.99906" width="511pt"><g><path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 140 268.863281 L 190.953125 214.074219 L 190.953125 349.125 C 190.953125 355.925781 196.519531 361.492188 203.320312 361.492188 C 210.125 361.492188 215.6875 355.925781 215.6875 349.125 L 215.6875 214.074219 L 266.640625 268.863281 C 269.113281 271.457031 272.332031 272.820312 275.667969 272.820312 C 278.636719 272.820312 281.730469 271.707031 284.078125 269.480469 C 289.027344 264.78125 289.398438 256.988281 284.699219 252.042969 L 212.226562 174.253906 C 209.875 171.78125 206.660156 170.296875 203.199219 170.296875 C 199.734375 170.296875 196.519531 171.78125 194.171875 174.253906 L 121.699219 252.042969 C 117 256.988281 117.371094 264.902344 122.316406 269.480469 C 127.511719 274.179688 135.300781 273.808594 140 268.863281 Z M 140 268.863281 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /></g></svg>
	</a>
</section>

<?php include "footer.php" ?>