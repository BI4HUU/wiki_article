<?php session_start(); 
?>

<!DOCTYPE html>

<?php include "header.php" ?>

<section class="container">
	<div id="wrap_gen">
		<!-- <h4>Keywords</h4> -->
		<textarea linc placeholder="linc" tabindex cols rows ></textarea>
		<textarea keywords placeholder="Keywords" tabindex cols rows ></textarea>
		<!-- <h4>Description</h4> -->
		<textarea description placeholder="Description" tabindex cols rows ></textarea>
		<!-- <h4>Title</h4> -->
		<textarea title placeholder="Title" tabindex cols rows ></textarea>
		<!--<h4>Photo & Video</h4>-->
		<!--<input photo_video type="file" accept name>-->
		<!-- <h4>Paragraph</h4> -->
		<!-- <textarea paragraph  placeholder="Paragraph" tabindex cols rows ></textarea> -->
		<!-- <h4>Heading</h4> -->
		<!-- <textarea heading placeholder="Heading" tabindex cols rows ></textarea> -->
		<!--<h4>Photo</h4>-->
		<!--<input photo type="file" accept name>-->
	</div>
	<button onclick="AddParagraph()">Add Paragraph</button>
	<button onclick="AddHeading()">Add Heading</button>
	<button onclick="Generate()">End</button>


<script>
var textarea = document.getElementsByTagName('textarea')
// attributes
// innerText
var body = document.getElementById("body");
var sendDataHTML = "";
	var linc;
	var title;
	var name = 'nameTest'
	var description;
	var keywords;
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

		if (textarea[i].hasAttribute('paragraph')) {
			var el = document.createElement("p")
			el.innerHTML = textarea[i].value
			// el.appendChild(body);
			// console.log(el.outerHTML)
			sendDataHTML += el.outerHTML;
		}

		if (textarea[i].hasAttribute('heading')) {
			var el = document.createElement("h3")
			el.innerText = textarea[i].value
			// el.appendChild(body);
			// console.dir(el.outerHTML)
			sendDataHTML += el.outerHTML;
		}
	}
			// console.dir(sendDataHTML)

	const btn = document.querySelector('button');

	function sendData() {
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'addarticle.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `body=${ sendDataHTML }&linc=${linc }&title=${title }&description=${description }&keywords=${keywords }&name=${name }` );
	} 
	sendData()

	// btn.addEventListener( 'click', function() {
	// 	sendData( { 'body' :'ok'} );
	// } )

}
var wrap_gen = document.getElementById('wrap_gen')
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

</section>
<?php include "footer.php";  ?>
