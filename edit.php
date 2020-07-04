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
			<div class="adminBtn">
				<div onclick="delPhotoMain()" class="button button_signIn">Delete</div>
			</div>
			<img src="<?php echo $row['img'] ?>" class="photoMain">
		</div>


		<textarea category id="category" placeholder="Category" tabindex cols rows="1" ><?php echo $row['category'] ?></textarea>
		<textarea keywords placeholder="Keywords" tabindex cols rows="1" ><?php echo $row['keywords'] ?></textarea>
		<textarea description placeholder="Description" tabindex cols rows="1" ><?php echo $row['description'] ?></textarea>
		<textarea title id="title" placeholder="Title" tabindex cols rows="1" ><?php echo $row['title'] ?></textarea>

		<div id="wrap_chooseHead">
			<img src="<?php echo $row['img_head'] ?>" class="photoHead">
			<div class="adminBtn">
				<div onclick="delPhotoHead()" class="button button_signIn">Delete</div>
			</div>
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
var linkPhotoMain = '<?php echo $row['img'] ?>';
var linkPhotoHead = '<?php echo $row['img_head'] ?>';
var wrap_chooseMain = document.getElementById("wrap_chooseMain");
var wrap_chooseHead = document.getElementById("wrap_chooseHead");
var files; // переменная. будет содержать данные файлов
	// заполняем переменную данными, при изменении значения поля file
	// $('.photo_main').on('change', function(){
	// 	files = this.files;
	// });
	function change_main(file) {
		files = file.files;
		upload_photo_main( event );
	}
	function change_head(file) {
		files = file.files;
		upload_photo_head( event );
	}

	// обработка и отправка AJAX запроса при клике на кнопку upload_files


function upload_photo_main( event ){
	// event.stopPropagation(); // остановка всех текущих JS событий
	// event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
	// ничего не делаем если files пустой
	if( typeof files == 'undefined' ) return;
	// создадим объект данных формы
	var data = new FormData();
	// заполняем объект данных файлами в подходящем для отправки формате
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	// добавим переменную для идентификации запроса
	data.append( 'my_file_upload', 1 );
	// AJAX запрос
	$.ajax({
		url         : 'imgmain.php',
		type        : 'POST', // важно!
		data        : data,
		cache       : false,
		dataType    : 'json',
		// отключаем обработку передаваемых данных, пусть передаются как есть
		processData : false,
		// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
		contentType : false,
		// функция успешного ответа сервера
		success     : function( respond, status, jqXHR ){
			if( typeof respond.error === 'undefined' ){
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				linkPhotoMain = '';
				$.each( files_path, function( key, val ){
					linkPhotoMain += val;
					linkPhotoMain = linkPhotoMain.substr(38);
				} )
				var a_b = document.createElement("div");
				a_b.setAttribute('class', 'adminBtn');
				a_b.innerHTML = "<div onclick='delPhotoMain()' class='button button_signIn'>Delete</div>";
				wrap_chooseMain.append(a_b);
				var img = document.createElement("img");
				img.setAttribute('src', linkPhotoMain);
				img.setAttribute('class', 'photoMain');
				wrap_chooseMain.append(img);
				wrap_chooseMain.getElementsByClassName("button")[0].remove();
				wrap_chooseMain.getElementsByClassName("choose")[0].remove();
			}
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});
};

function upload_photo_head(event){
	// console.log(event);
	// event.stopPropagation(); остановка всех текущих JS событий
	// event.preventDefault();  остановка дефолтного события для текущего элемента - клик для <a> тега
	// ничего не делаем если files пустой
	if( typeof files == 'undefined' ) return;
	// создадим объект данных формы
	var data = new FormData();
	// заполняем объект данных файлами в подходящем для отправки формате
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	// добавим переменную для идентификации запроса
	data.append( 'my_file_upload', 1 );
	// AJAX запрос
	$.ajax({
		url         : 'imghead.php',
		type        : 'POST', // важно!
		data        : data,
		cache       : false,
		dataType    : 'json',
		// отключаем обработку передаваемых данных, пусть передаются как есть
		processData : false,
		// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
		contentType : false,
		// функция успешного ответа сервера
		success     : function( respond, status, jqXHR ){
			if( typeof respond.error === 'undefined' ){
				var files_path = respond.files;
				linkPhotoHead = '';
				$.each( files_path, function( key, val ){
					linkPhotoHead += val;
					linkPhotoHead = linkPhotoHead.substr(38);
				} );
				var img = document.createElement("img");
				var a_b = document.createElement("div");
				a_b.setAttribute('class', 'adminBtn');
				a_b.innerHTML = "<div onclick='delPhotoHead()' class='button button_signIn'>Delete</div>";
				img.setAttribute('src', linkPhotoHead);
				img.setAttribute('class', 'photoHead');
				wrap_chooseHead.append(img);
				wrap_chooseHead.append(a_b);
				wrap_chooseHead.getElementsByClassName("button")[0].remove();
				wrap_chooseHead.getElementsByClassName("choose")[0].remove();
			}
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});
};



function delPhotoMain() {
	wrap_chooseMain.getElementsByClassName("photoMain")[0].remove();
	wrap_chooseMain.getElementsByClassName("adminBtn")[0].remove();

	var Choose = document.createElement("input");
	var ChooseA = document.createElement("div");
	Choose.setAttribute('id', 'chooseMain');
	Choose.setAttribute('class', 'choose chooseMain photo_main');
	Choose.setAttribute('onchange', 'change_main(this)');
	Choose.setAttribute('type', 'file');
	Choose.setAttribute('multiple', 'multiple');
	Choose.setAttribute('accept', 'image/jpg');
	ChooseA.setAttribute('class', 'upload_photo_head button');
	// ChooseA.setAttribute('onclick', 'upload_photo_main(this)');
	ChooseA.innerHTML = '<label for="chooseMain">Загрузить фото превю</label>';

	wrap_chooseMain.append(Choose);
	wrap_chooseMain.append(ChooseA);
};

function delPhotoHead() {
	wrap_chooseHead.getElementsByClassName("photoHead")[0].remove();
	wrap_chooseHead.getElementsByClassName("adminBtn")[0].remove();

	var Choose = document.createElement("input");
	var ChooseA = document.createElement("div");
	Choose.setAttribute('id', 'chooseHead');
	Choose.setAttribute('class', 'choose chooseMain photo_main');
	Choose.setAttribute('onchange', 'change_head(this)');
	Choose.setAttribute('type', 'file');
	Choose.setAttribute('multiple', 'multiple');
	Choose.setAttribute('accept', 'image/jpg');
	ChooseA.setAttribute('class', 'upload_photo_head button');
	ChooseA.innerHTML = '<label for="chooseHead">Загрузить фото превю</label>';

	wrap_chooseHead.append(Choose);
	wrap_chooseHead.append(ChooseA);
};

function upload_files() {
	event.stopPropagation(); // остановка всех текущих JS событий
	event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
	// ничего не делаем если files пустой
	if( typeof files == 'undefined' ) return;
	// создадим объект данных формы
	var data = new FormData();
	// заполняем объект данных файлами в подходящем для отправки формате
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	data.append( 'my_file_upload', 1 );
	$.ajax({
		url         : 'img.php',
		type        : 'POST', // важно!
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
	sendData();
}
var wrap_gen = document.getElementById('wrap_gen');


</script>

</section>
<?php include "footer.php";  ?>