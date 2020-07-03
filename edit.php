<?php session_start();

	include "connect.php";
	$id_article = $_GET["edit"];
	$res = $mysqli->query("SELECT * FROM article WHERE id_article = '$id_article'");
	$row = $res->fetch_assoc();
	
	if($_COOKIE["sessionkey"]){
	} else {
		if($_SESSION['sessionkey']){
			$name = $_SESSION['full_name'];
			$sessionkey = $_SESSION['sessionkey'];
		} else {
			header('Location: /index.php');
			exit;
		};
	};

include "header.php";?>

<section class="container"><?php echo $_COOKIE["sessionname"]; echo ($_COOKIE["sessionkey"] . '|||'); echo $_SESSION['full_name']; echo $_SESSION['sessionkey']; ?>
	<div id="wrap_gen">
		<textarea id="link" linc placeholder="linc" tabindex cols rows ><?php echo $row['linc'] ?></textarea>


		<div id="wrap_chooseMain">
			<input onchange="change(this)" class="choose chooseMain photo_main"  value="Choose main photo" type="file" multiple="multiple" accept="image/jpg">
			<a href="#" class="upload_photo_main button">Загрузить файлы</a>
		</div>


		<textarea category id="category" placeholder="Category" tabindex cols rows="1" ><?php echo $row['category'] ?></textarea>
		<textarea keywords placeholder="Keywords" tabindex cols rows="1" ><?php echo $row['keywords'] ?></textarea>
		<textarea description placeholder="Description" tabindex cols rows="1" ><?php echo $row['description'] ?></textarea>
		<textarea title id="title" placeholder="Title" tabindex cols rows="1" ><?php echo $row['title'] ?></textarea>
		<div id="wrap_chooseHead">
			<input class="choose chooseMain photo_main" value="Choose main photo" type="file" multiple="multiple" accept="image/jpg">
			<a href="#" class="upload_photo_head button">Загрузить файлы</a>
		</div>

		<div name="editor1" id="editor1">
			<?php echo $row['body'] ?>
		</div>

	</div>
	<div class="ajax-reply"></div>

	<button style="margin:20px auto;display: block;" class="button button_signIn" onclick="Generate()">End</button>

	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckfinder/ckfinder.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>CKEDITOR.replace( 'editor1' );</script>
<script>
	setTimeout(function(){ cke_1_contents.style.height = "555px" }, 1000);
var linkPhotoMain = '';
var linkPhotoHead = '';
var files;
	$('.photo_main').on('change', function(){
		files = this.files;
	});
	function change(file) {
		files = file.files;
	}
$('.upload_photo_main').on( 'click', function( event ){
	event.stopPropagation();
	event.preventDefault();
	if( typeof files == 'undefined' ) return;
	var data = new FormData();
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	data.append( 'my_file_upload', 1 );
	$.ajax({
		url         : 'imgmain.php',
		type        : 'POST',
		data        : data,
		cache       : false,
		dataType    : 'json',
		processData : false,
		contentType : false,
		success     : function( respond, status, jqXHR ){
			if( typeof respond.error === 'undefined' ){
				var files_path = respond.files;
				$.each( files_path, function( key, val ){
					linkPhotoMain += val;
					linkPhotoMain = linkPhotoMain.substr(38);
				} )
				var img = document.createElement("img")
				img.setAttribute('src', linkPhotoMain);
				img.setAttribute('class', 'photoMain');
				document.getElementById("link").after(img);
				document.getElementById("wrap_chooseMain").remove();
			}
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});

});
$('.upload_photo_head').on( 'click', function( event ){
	event.stopPropagation();
	event.preventDefault();
	if( typeof files == 'undefined' ) return;
	var data = new FormData();
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	data.append( 'my_file_upload', 1 );
	$.ajax({
		url         : 'imghead.php',
		type        : 'POST',
		data        : data,
		cache       : false,
		dataType    : 'json',
		processData : false,
		contentType : false,
		success     : function( respond, status, jqXHR ){
			if( typeof respond.error === 'undefined' ){
				var files_path = respond.files;
				$.each( files_path, function( key, val ){
					linkPhotoHead += val;
					linkPhotoHead = linkPhotoHead.substr(38);
				} )
				var img = document.createElement("img");
				img.setAttribute('src', linkPhotoHead);
				img.setAttribute('class', 'photoHead');
				document.getElementById("title").before(img);
				document.getElementById("wrap_chooseHead").remove();
			}
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});

});

function upload_files() {
	event.stopPropagation();
	event.preventDefault();
	if( typeof files == 'undefined' ) return;
	var data = new FormData();
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	data.append( 'my_file_upload', 1 );
	$.ajax({
		url         : 'img.php',
		type        : 'POST',
		data        : data,
		cache       : false,
		dataType    : 'json',
		processData : false,
		contentType : false,
		success     : function( respond, status, jqXHR ){
			if( typeof respond.error === 'undefined' ){
				var files_path = respond.files;
				var linkPhoto = '';
				$.each( files_path, function( key, val ){
					linkPhoto += val;
					linkPhoto = linkPhoto.substr(38);
				} )
				var img = document.createElement("img")
				img.setAttribute('src', linkPhoto);
				img.setAttribute('class', 'photo');
				var textareaimg = document.createElement("textarea")
				textareaimg.setAttribute('img', linkPhoto);
				document.getElementById("wrap_gen").append(textareaimg);
				document.getElementById("wrap_gen").append(img);
			}
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});
}

var textarea = document.getElementsByTagName('textarea');
var body = document.getElementById("body");
var sendDataHTML = "";
var linc;
var title;
var name = 'nameTest';
var description;
var keywords;
var category;
function Generate() {
	for (var i = 0; i < textarea.length; i++) {
		if (textarea[i].hasAttribute('linc')) {
			linc = textarea[i].value;
		}
		if (textarea[i].hasAttribute('keywords')) {
			keywords = textarea[i].value;
		}
		if (textarea[i].hasAttribute('description')) {
			description = textarea[i].value;
		}
		if (textarea[i].hasAttribute('title')) {
			title = textarea[i].value;
		}
		if (textarea[i].hasAttribute('category')) {
			category = textarea[i].value;
		}
		if (textarea[i].hasAttribute('img')) {
			var imgBlock = document.createElement("img")
			imgBlock.src = textarea[i].getAttribute("img");
			sendDataHTML += imgBlock.outerHTML;
		}
	}

	const btn = document.querySelector('button');

	var DataHTML_CK = CKEDITOR.instances.editor1.getData();
	function sendData() {
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'editarticle.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `body=${ DataHTML_CK }&linc=${linc }&title=${title }&description=${description }&keywords=${keywords }&img=${linkPhotoMain}&img_head=${linkPhotoHead}&category=${category}&id=${<?php echo $id_article ?>}` );
		XHR.onload = function() {
				document.location.href = "/g.php";
			};
	}
	sendData()
}
var wrap_gen = document.getElementById('wrap_gen');



</script>

</section>
<?php include "footer.php";  ?>