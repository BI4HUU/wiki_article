<?php session_start();
	if (!$_COOKIE["sessionkey"]) {
		header("Location: /register.php"); exit; } ?>

<!DOCTYPE html>

<?php include "header.php" ?>

<section class="container">
	<div id="wrap_gen">
		<!-- <h4>Keywords</h4> -->
		<textarea id="link" linc placeholder="linc" tabindex cols rows ></textarea>
		<div class="wrap_choose">
			<input class="choose chooseMain photo_main"  value="Choose main photo" type="file" multiple="multiple" accept="image/jpg">
			<a href="#" class="upload_photo_main button">Загрузить файлы</a>
		</div>
			<textarea category id="category" placeholder="Category" tabindex cols rows="1" ></textarea>
		<textarea keywords placeholder="Keywords" tabindex cols rows ></textarea>
		<!-- <h4>Description</h4> -->
		<textarea description placeholder="Description" tabindex cols rows ></textarea>
		<!-- <h4>Title</h4> -->
		<textarea title id="title" placeholder="Title" tabindex cols rows="1" ></textarea>
		<div class="wrap_choose">
			<input class="choose chooseMain photo_main" value="Choose main photo" type="file" multiple="multiple" accept="image/jpg">
			<a href="#" class="upload_photo_head button">Загрузить файлы</a>
		</div>

		<div ck id="editor">
		</div>

	</div>
	<div class="ajax-reply"></div>


	<!-- <button onclick="AddParagraph()">Add Paragraph</button>
	<button onclick="AddHeading()">Add Heading</button>
	<button onclick="AddChoose()">Add Photo</button>
	<button onclick="AddHTML()">Add HTML</button> -->
	<button onclick="Generate()">End</button>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var linkPhotoMain = '';
var linkPhotoHead = '';
var files; // переменная. будет содержать данные файлов
	// заполняем переменную данными, при изменении значения поля file
	$('.photo_main').on('change', function(){
		files = this.files;
	});
	function change(file) {
		files = file.files;
	}
	// обработка и отправка AJAX запроса при клике на кнопку upload_files
$('.upload_photo_main').on( 'click', function( event ){
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
			// ОК - файлы загружены
			if( typeof respond.error === 'undefined' ){
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				$.each( files_path, function( key, val ){
					linkPhotoMain += val;
					linkPhotoMain = linkPhotoMain.substr(38);
				} )
				var img = document.createElement("img")
				img.setAttribute('src', linkPhotoMain);
				img.setAttribute('class', 'photoMain');
				document.getElementById("link").after(img);
			}
			// ошибка
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		// функция ошибки ответа сервера
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});

});
	// обработка и отправка AJAX запроса при клике на кнопку upload_photo_head
$('.upload_photo_head').on( 'click', function( event ){
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
			// ОК - файлы загружены
			if( typeof respond.error === 'undefined' ){
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				$.each( files_path, function( key, val ){
					linkPhotoHead += val;
					linkPhotoHead = linkPhotoHead.substr(38);
				} )
				var img = document.createElement("img");
				img.setAttribute('src', linkPhotoHead);
				img.setAttribute('class', 'photoHead');
				document.getElementById("title").before(img);
			}
			// ошибка
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		// функция ошибки ответа сервера
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});

});

// обработка и отправка AJAX запроса при клике на кнопку upload_files
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
	// добавим переменную для идентификации запроса
	data.append( 'my_file_upload', 1 );
	// AJAX запрос
	$.ajax({
		url         : 'img.php',
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
			// ОК - файлы загружены
			if( typeof respond.error === 'undefined' ){
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){
					html += val;
				} )
				var img = document.createElement("img")
				img.setAttribute('src', html.substr(38));
				wrap_gen.append(img)
				var imgTextA = document.createElement("textarea");
				imgTextA.setAttribute('img', html.substr(38));
				imgTextA.setAttribute('style', 'display:none');
				wrap_gen.append(imgTextA);
			}
			// ошибка
			else {
				console.log('ОШИБКА: ' + respond.data );
			}
		},
		// функция ошибки ответа сервера
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

		if (textarea[i].hasAttribute('paragraph')) {
			var el = document.createElement("p")
			el.innerHTML = textarea[i].value;
			sendDataHTML += el.outerHTML;
		}

		if (textarea[i].hasAttribute('heading')) {
			var el = document.createElement("h3")
			el.innerText = textarea[i].value;
			sendDataHTML += el.outerHTML;
		}
	}

	const btn = document.querySelector('button');

	function sendData() {
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'addarticle.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `body=${ sendDataHTML }&linc=${linc }&title=${title }&description=${description }&keywords=${keywords }&name=${name }&img=${linkPhotoMain}&img_head=${linkPhotoHead}&category${category}` );
		XHR.onload = function() {
				document.location.href = "/g.php";
			};
	}
	sendData()

	// btn.addEventListener( 'click', function() {
	// 	sendData( { 'body' :'ok'} );
	// } )

}
var wrap_gen = document.getElementById('wrap_gen');

function AddChoose() {
	var Choose = document.createElement("input")
	var ChooseA = document.createElement("a")

	Choose.setAttribute('choose', '');
	Choose.setAttribute('class', 'choose chooseMain');
	Choose.setAttribute('value', 'Choose main photo');
	Choose.setAttribute('type', 'file');
	Choose.setAttribute('multiple', 'multiple');
	Choose.setAttribute('accept', 'image/jpg');
	Choose.setAttribute('onchange', 'change(this)');
	ChooseA.setAttribute('class', 'upload_photo_main button');
	ChooseA.setAttribute('href', '#');
	ChooseA.setAttribute('onclick', 'upload_files()');
	ChooseA.innerText = 'Загрузить файлы';
	wrap_gen.append(Choose);
	wrap_gen.append(ChooseA);
}

function AddParagraph() {
	var pp = document.createElement("textarea")
	pp.setAttribute('paragraph', '');
	pp.setAttribute('placeholder', 'Paragraph');
	pp.setAttribute('tabindex', '');
	pp.setAttribute('cols', '');
	pp.setAttribute('rows', '');
	wrap_gen.append(pp)
}
function AddHeading() {
	var pp = document.createElement("textarea")
	pp.setAttribute('heading', '');
	pp.setAttribute('placeholder', 'Heading');
	pp.setAttribute('tabindex', '');
	pp.setAttribute('cols', '');
	pp.setAttribute('rows', '');
	wrap_gen.append(pp)
}

</script>

<script><?php include "ckeditor.js";  ?></script>
<script>
	ClassicEditor.create(document.querySelector( '#editor' ));
	// ClassicEditor.create(document.querySelector( '#editor2' ));
</script>

</section>
<?php include "footer.php";  ?>
