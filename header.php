<?php
	global $title; $title = "Article";
	global $description;
	global $keywords;
	global $menu_item_active;
	// $_SESSION['sessionkey'] = $_COOKIE["sessionkey"];
	// $_SESSION['sessionname'] = $_COOKIE["sessionname"];
	// $_SESSION['tel'] = $row['tel'];
	// $_SESSION['full_name'] = $row['name'];
	// if ($sessionkey) {
	// 	$res = $connect->query("SELECT * FROM users WHERE sessionkey = '$sessionkey'");
	// 	$row = $res->fetch_assoc();
	// 	$_SESSION['full_name'] = $row["name"];
	// };

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo $description ?>">
	<meta name="keywords" content="<?php echo $keywords ?>">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
	<style>/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

		/* Document
		   ========================================================================== */

		/**
		 * 1. Correct the line height in all browsers.
		 * 2. Prevent adjustments of font size after orientation changes in iOS.
		 */

		html {
			line-height: 1.15; /* 1 */
			-webkit-text-size-adjust: 100%; /* 2 */
		}

		/* Sections
		   ========================================================================== */

		/**
		 * Remove the margin in all browsers.
		 */

		body {
			margin: 0;
		}

		/**
		 * Render the `main` element consistently in IE.
		 */

		main {
			display: block;
		}

		/**
		 * Correct the font size and margin on `h1` elements within `section` and
		 * `article` contexts in Chrome, Firefox, and Safari.
		 */

		h1 {
			font-size: 2em;
			margin: 0.67em 0;
		}

		/* Grouping content
		   ========================================================================== */

		/**
		 * 1. Add the correct box sizing in Firefox.
		 * 2. Show the overflow in Edge and IE.
		 */

		hr {
			box-sizing: content-box; /* 1 */
			height: 0; /* 1 */
			overflow: visible; /* 2 */
		}

		/**
		 * 1. Correct the inheritance and scaling of font size in all browsers.
		 * 2. Correct the odd `em` font sizing in all browsers.
		 */

		pre {
			font-family: monospace, monospace; /* 1 */
			font-size: 1em; /* 2 */
		}

		/* Text-level semantics
		   ========================================================================== */

		/**
		 * Remove the gray background on active links in IE 10.
		 */

		a {
			background-color: transparent;
		}

		/**
		 * 1. Remove the bottom border in Chrome 57-
		 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
		 */

		abbr[title] {
			border-bottom: none; /* 1 */
			text-decoration: underline; /* 2 */
			text-decoration: underline dotted; /* 2 */
		}

		/**
		 * Add the correct font weight in Chrome, Edge, and Safari.
		 */

		b,
		strong {
			font-weight: bolder;
		}

		/**
		 * 1. Correct the inheritance and scaling of font size in all browsers.
		 * 2. Correct the odd `em` font sizing in all browsers.
		 */

		code,
		kbd,
		samp {
			font-family: monospace, monospace; /* 1 */
			font-size: 1em; /* 2 */
		}

		/**
		 * Add the correct font size in all browsers.
		 */

		small {
			font-size: 80%;
		}

		/**
		 * Prevent `sub` and `sup` elements from affecting the line height in
		 * all browsers.
		 */

		sub,
		sup {
			font-size: 75%;
			line-height: 0;
			position: relative;
			vertical-align: baseline;
		}

		sub {
			bottom: -0.25em;
		}

		sup {
			top: -0.5em;
		}

		/* Embedded content
		   ========================================================================== */

		/**
		 * Remove the border on images inside links in IE 10.
		 */

		img {
			border-style: none;
		}

		/* Forms
		   ========================================================================== */

		/**
		 * 1. Change the font styles in all browsers.
		 * 2. Remove the margin in Firefox and Safari.
		 */

		button,
		input,
		optgroup,
		select,
		textarea {
			font-family: inherit; /* 1 */
			font-size: 100%; /* 1 */
			line-height: 1.15; /* 1 */
			margin: 0; /* 2 */
		}

		/**
		 * Show the overflow in IE.
		 * 1. Show the overflow in Edge.
		 */

		button,
		input { /* 1 */
			overflow: visible;
		}

		/**
		 * Remove the inheritance of text transform in Edge, Firefox, and IE.
		 * 1. Remove the inheritance of text transform in Firefox.
		 */

		button,
		select { /* 1 */
			text-transform: none;
		}

		/**
		 * Correct the inability to style clickable types in iOS and Safari.
		 */

		button,
		[type="button"],
		[type="reset"],
		[type="submit"] {
			-webkit-appearance: button;
		}

		/**
		 * Remove the inner border and padding in Firefox.
		 */

		button::-moz-focus-inner,
		[type="button"]::-moz-focus-inner,
		[type="reset"]::-moz-focus-inner,
		[type="submit"]::-moz-focus-inner {
			border-style: none;
			padding: 0;
		}

		/**
		 * Restore the focus styles unset by the previous rule.
		 */

		button:-moz-focusring,
		[type="button"]:-moz-focusring,
		[type="reset"]:-moz-focusring,
		[type="submit"]:-moz-focusring {
			outline: 1px dotted ButtonText;
		}

		fieldset {
			padding: 0.35em 0.75em 0.625em;
		}

		legend {
			box-sizing: border-box; /* 1 */
			color: inherit; /* 2 */
			display: table; /* 1 */
			max-width: 100%; /* 1 */
			padding: 0; /* 3 */
			white-space: normal; /* 1 */
		}

		progress {
			vertical-align: baseline;
		}

		/**
		 * Remove the default vertical scrollbar in IE 10+.
		 */

		textarea {
			overflow: auto;
		}

		/**
		 * 1. Add the correct box sizing in IE 10.
		 * 2. Remove the padding in IE 10.
		 */

		[type="checkbox"],
		[type="radio"] {
			box-sizing: border-box; /* 1 */
			padding: 0; /* 2 */
		}

		/**
		 * Correct the cursor style of increment and decrement buttons in Chrome.
		 */

		[type="number"]::-webkit-inner-spin-button,
		[type="number"]::-webkit-outer-spin-button {
			height: auto;
		}

		/**
		 * 1. Correct the odd appearance in Chrome and Safari.
		 * 2. Correct the outline style in Safari.
		 */

		[type="search"] {
			-webkit-appearance: textfield; /* 1 */
			outline-offset: -2px; /* 2 */
		}

		/**
		 * Remove the inner padding in Chrome and Safari on macOS.
		 */

		[type="search"]::-webkit-search-decoration {
			-webkit-appearance: none;
		}

		/**
		 * 1. Correct the inability to style clickable types in iOS and Safari.
		 * 2. Change font properties to `inherit` in Safari.
		 */

		::-webkit-file-upload-button {
			-webkit-appearance: button; /* 1 */
			font: inherit; /* 2 */
		}

		details {
			display: block;
		}

		/*
		 * Add the correct display in all browsers.
		 */

		summary {
			display: list-item;
		}

	</style>

	<!-- Bootstrap -->
	<style>
		.w-100 {
			width: 100%;}
		.container {
			width: 100%;
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;}

		@media (max-width: 600px) {
			.container{
				padding-right: 0;
				padding-left: 0;}}

		.container_article img {
			display: flex;
			width: 100%;
		}
		.container_article > * {
			width: 100%;
			margin-right: auto;
			margin-left: auto; }
		.container_article > ul, .container_article > ol  {
			width: calc(100% - 40px);}

		.container_index {
			justify-content: center;
		}

		.card {
			display: flex;
			height: 300px;
			width: 300px;
			margin: 15px;
			background-color: #ddd;
			text-decoration: none;}

		@media (max-width: 360px) {
			.card{
				margin: 15px 0px;}}

		.cardDiv{
			display: flex; z-index: 1; position: relative; height: 100%; width: 100%;background-size: cover;}

		.card_text {
			font-size: 20px;
			margin: 0;
			margin-top: auto;
			padding: 12px;
			width: 100%;
			color: #ffffff;
			background-color: rgba(33, 33, 33, 0.4);
		}

		.row {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
		}

        .comments h3 {
            margin-bottom: 5px;
        }
        
		@media (min-width: 576px) {
			.container {
				max-width: 540px; }
			.container_article > * {
				max-width: 540px; }}

		@media (min-width: 768px) {
			.container {
				max-width: 720px;
			}
			.container_article > * {
				max-width: 720px; }
		}
		@media (min-width: 992px) {
			.container {
				max-width: 960px;
			}
			.container_article > * {
				max-width: 960px; }
		}
		@media (min-width: 1200px) {
			.container {
				max-width: 1140px;
			}
			.container_article > * {
				max-width: 1140px; }
		}
		@media (min-width: 1500px) {
			.container {
				max-width: 1330px;
			}
			.container_article > * {
				max-width: 1330px; }
		}

	</style>

	<!-- Style body -->
	<style>
		h3 {
			margin-top: 2em;
		}

		h4 {
			margin-top: 2em;
			margin-bottom: 1em;
		}

		#mesegesCalbeack{
			margin: 3em auto 1em auto;
			color: #ffcc00;
			font-size: 22px;
		}

		form {
			display: flex;
			justify-content: center;
			flex-direction: column;
			max-width: 500px;
			margin: 4em auto 1em auto;
			border: 1px solid #222;
			padding: 3em 2em 2em 2em;
		}

		form > *{
			margin-left: auto;
			margin-right: auto;
		}

		form label{
			display: block;
			margin-top: 2em;
		}

		form input{
			margin-top: 20px;
			font-size: 20px;
			border: none;
			border-bottom: 1px solid #222;
			outline: none;
		}

		form button{
			/* margin: 2em auto 0 auto; */
			margin: 0 15px 0 0;
		}

		#wrap_button { margin-top: 15px;flex-wrap: wrap;}
		.wrap_button button{ margin-top: 10px;}
		.wrap_button {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin: 20px auto 22px auto;
		}
		
		.upload_photo_head,
		#wrap_chooseMainVideo {
			margin-bottom: 20px;
			margin-bottom: 2rem;}

		#tel {
			width: 100%;
			max-width: 310px;
		}

		textarea{
			display: block;
			border: none;
			margin: 2em 0 0.3em 0
		}

		textarea[title]{
			font-size: 36px;
			margin: 1em 0 0.3em 0
		}

		textarea[heading]{
			font-size: 28px;
			font-weight: 500;
		}

		textarea[paragraph]{
			font-size: 16px;
		}


	</style>

	<style>
		html, body{
			font-family: 'Arial,Open Sans,sans-serif';
			letter-spacing: 0.8px;
			font-weight: 400}

		.menuLeftWrap{
			display: flex;
			width: 100%;
			height: 100%;
			position: fixed;
			z-index: 3;
			left: -100%;
			/* transition: all 0.4s; */
		}
		.menuLeft{
			position: absolute;
			width: 300px;
			height: 100%;
			left: -100%;
			box-sizing: border-box;
			background: #fff;
			transition: all 0.4s;
			border-right: solid 1px rgb(219, 219, 219);	}

		.menuLeft_active .menuShadw{
			opacity: 1;
			background: rgba(88, 88, 88, 0.4);
			height: 100%;
			width: 100%;
		}
		.menuLeft_active .menuLeft{
			left: 0;
		}
		.menuLeft_active {
			left: 0;
		}
		.menuLeft > a{
			display: block;
			padding: 10px;
			color: #333;
			text-decoration: none;

		}
		.menuLeft > a:hover{
			color: #000;
			text-decoration: underline;}

		header {
			height: 60px;}

		@media (max-width: 630px) {
			header {
				height: 50px;}}

		@media (max-width: 530px) {
			header {
				height: 45px;}}

		.head {
			width: 100%;
			max-width: 100%;
			padding: 0;
			margin: 0;
			position: relative;
			z-index: -3; }

		.head img,
		.head video {
			width: 100%;
			max-width: 100%;
			height: auto;

		}

		.head .blekFone {
			position: absolute;
			z-index: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background: rgba(8, 8, 8, 0.5);	}

		.head h1 {
			display: block;
			text-align: center;
			padding: 15px 0;
			width: 100%; }

		.blekFone h1 {
			display: block;
			text-align: center;
			color: #fff;
			padding: 15px;
			width: 100%; }

		.header_container > * {
			margin-left: 18px;
			margin-right: 18px;	}

		@media (max-width: 400px) {
			.header_container > * {
				margin-left: 8px;
				margin-right: 8px;	}}

		.header_container {
			display: flex;
			height: 60px;
			width: 100%;
			top: 0;
			justify-content: space-between;
			align-items: center;
			position: fixed;
			z-index: 8;
			background: #f3f3f3;
			border-bottom: solid 1px rgb(219, 219, 219);}

		@media (max-width: 630px) {
			.header_container {
				height: 50px;}}

		@media (max-width: 530px) {
			.header_container {
				height: 45px;}}

		.burger{
			cursor: pointer; }

		.logo_burger{
			display: flex;
			align-items: center;}

		.burger_line{
			transition: all 0.2s;
			opacity: 1;
			transform: rotate(0deg);
			width: 18px;
			height: 2px;
			background: #000;
		}
		.burger_close .burger_line_1{
			transform-origin: top left;
			transform: rotate(42deg);
			width: 19px;
		}
		.burger_close .burger_line_2{
			opacity: 0;}
		.burger_line_2{
			margin-top: 4px;
			margin-bottom: 4px;	}
		.burger_close .burger_line_3{
			transform-origin: bottom left;
			transform: rotate(-42deg);
			width: 19px;}
		.burger{
			padding: 10px;
		}
		.auth_download{
			display: flex;
			align-items: center;}

		/* @media (min-width: 630px) {
			.menuLeft .auth_download{
				display: none;}}

		@media (max-width: 630px) {
			.header_container .auth_download{
				display: none;}} */

		.svg_files {
			display: block;
			width: 37px;
			height: 40px;
			margin-right: 12px;
            margin-top: 15px}
		.button{
			display: inline-block;
			padding: 12px 32px;
			border-radius: 4px;
			font-size: 18px;
			font-weight: 500;
			white-space: nowrap;
			text-decoration: none;
			cursor: pointer;
			border: 1px solid #ff6a00;	}
		.button_signIn{
			border: 2px #ff6a00 solid;
			color: #ff6a00;
			margin-top: 15px;	}
		.button_signIn:hover{
			background: #ff6a00;
			color: #ffffff;

		}

		.menu{
			display: flex;
			align-items: center; }
		.menu_item{
			font-size: 18px;
			font-weight: 500;
			color: rgb(100, 100, 100);
			margin-top: 3px;
			padding: 0 15px;
			cursor: pointer;}

		@media (max-width: 530px) {
			.menu_item{
				font-size: 15px;
				margin-top: 2px;}}

		.menu_item:hover{
			color: rgb(10, 10, 10);}

		.menu_item_active{
			margin-top: 0px;
			font-size: 22px;
			color: rgb(10, 10, 10);}

		@media (max-width: 530px) {
			.menu_item_active{
				font-size: 18px;}}

		textarea {
			width: 88%; }
		.photoMain { height: 300px; width: 300px;}
		.author {
			margin-left: auto;
			text-align: right;
			color: #444;}

		.adminBtn{
			position: absolute;
			top: 0;
			display: flex;
			width: 100%;
			flex-direction: column;
		}
		.adminBtn > *{
			display: block;
			margin: 15px auto 10px auto;
		}

		#chooseHead, #chooseMain, #chooseMainVideo{ display: none;}

		#wrap_chooseHead img{
			width: 100%;
			min-height: 180px;}

		#wrap_chooseMainVideo video{
			width: 100%;
			min-height: 180px;}

		#wrap_chooseMain{
			width: 300px;}

		#wrap_chooseHead, #wrap_chooseMain, #wrap_chooseMainVideo{
			position: relative;}

		#wrap_chooseHead .adminBtn {
			opacity: 0;}

		#wrap_chooseMain .adminBtn {
			opacity: 0;}

		#wrap_chooseMainVideo .adminBtn {
			z-index: 7;
			opacity: 0;}

		#wrap_chooseHead .button {
			background: #fff;}

		#wrap_chooseMain .button {
			background: #fff;}

		#wrap_chooseMainVideo .button {
			background: #fff;}

		#wrap_chooseHead .button:hover {
			z-index: 8;
			background: #ff6a00;}

		#wrap_chooseMain .button:hover {
			z-index: 8;
			background: #ff6a00;}

		#wrap_chooseMainVideo .button:hover {
			z-index: 8;
			background: #ff6a00;}


		#wrap_chooseHead:hover .adminBtn {
			opacity: 1;
			height: 100%;
			width: 100%;
			background-color: rgba(33, 33, 33, 0.4);}

		#wrap_chooseMain:hover .adminBtn {
			opacity: 1;
			height: 100%;
			width: 100%;
			background-color: rgba(33, 33, 33, 0.4);}

		#wrap_chooseMainVideo:hover .adminBtn {
			opacity: 1;
			height: 100%;
			width: 100%;
			background-color: rgba(33, 33, 33, 0.4);}

		.categoryWrap {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			width: 100%;
			border: solid 1px #bbbbbb;
			margin: 18px 0;
		}
		.category {
			display: block;
			padding: 10px 20px;
			font-size: 20px;
			width: 100%;
			background-color: #bbbbbb;
			text-decoration: none;
			color: #222222;
		}
		.FB{ margin: auto; }

		.bottom_article {
			display: flex;
			align-items: center;
			margin-top: 2em; }

		#like1 {
			display: none;}
		#like1, #like2 {
			height: 30px;
			width: 30px;}

		.panel{
			display: flex;
			align-items: center;}

		.likeWrap{height: 30px; margin-left: 15px}

		.likeWrap:hover #like1{
			display: block;}
		.likeWrap:hover #like2{
			display: none;}

		.likeOk #like1{
			display: block;}
		.likeOk #like2{
			display: none;}
		.likeNumber{
			margin-left: 10px;
			font-size: 18px;
			color: #333333;
		}
		.red {
			color: red;}

	</style>
</head>
<body>
<header>
	<div class="header_container">
		<div class="logo_burger">
			<div class="burger">
				<div class="burger_line burger_line_1"></div>
				<div class="burger_line burger_line_2"></div>
				<div class="burger_line burger_line_3"></div>
			</div>
			<div class="logo"><a href="/" rel="noreferrer noopener">LOGO</a></div>
		</div>
		<div class="menu">
			<a href="index.php" class="menu_item menu_item1 <?php if (!$menu_item_active) echo 'menu_item_active'; ?>">Trending</a>
			<a href="category.php" class="menu_item menu_item2 <?php if ($menu_item_active) echo 'menu_item_active'; ?>">Discover</a>
		</div>
		<div style="display: none" class="auth_download">
			<a href="/create.php" rel="noreferrer noopener">
				<svg class="svg_files" xmlns="http://www.w3.org/2000/svg" height="511pt" version="1.1" viewBox="-53 1 511 511.99906" width="511pt"><g><path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 140 268.863281 L 190.953125 214.074219 L 190.953125 349.125 C 190.953125 355.925781 196.519531 361.492188 203.320312 361.492188 C 210.125 361.492188 215.6875 355.925781 215.6875 349.125 L 215.6875 214.074219 L 266.640625 268.863281 C 269.113281 271.457031 272.332031 272.820312 275.667969 272.820312 C 278.636719 272.820312 281.730469 271.707031 284.078125 269.480469 C 289.027344 264.78125 289.398438 256.988281 284.699219 252.042969 L 212.226562 174.253906 C 209.875 171.78125 206.660156 170.296875 203.199219 170.296875 C 199.734375 170.296875 196.519531 171.78125 194.171875 174.253906 L 121.699219 252.042969 C 117 256.988281 117.371094 264.902344 122.316406 269.480469 C 127.511719 274.179688 135.300781 273.808594 140 268.863281 Z M 140 268.863281 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /></g></svg>
			</a>

			<?php
				if ($_COOKIE["sessionkey"]) {
			?>
				<a href="index.php?logout=logout">
					<div class="button button_signIn">Выйты</div>
				</a>
			<?php } else { ?>
				<a href="register.php">
					<div class="button button_signIn">Войти</div>
				</a>
			<?php } ?>
		</div>
	</div>
</header>
<div class="menuLeftWrap">
	<main class="menuLeft">

		<div class="auth_download" style="padding: 10px;">
			<a href="/create.php"  rel="noreferrer noopener">
				<svg class="svg_files" id="svg_files" style="margin-right: 18px;margin-top:15px;display: none" xmlns="http://www.w3.org/2000/svg" height="511pt" version="1.1" viewBox="-53 1 511 511.99906" width="511pt"><g><path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /><path d="M 140 268.863281 L 190.953125 214.074219 L 190.953125 349.125 C 190.953125 355.925781 196.519531 361.492188 203.320312 361.492188 C 210.125 361.492188 215.6875 355.925781 215.6875 349.125 L 215.6875 214.074219 L 266.640625 268.863281 C 269.113281 271.457031 272.332031 272.820312 275.667969 272.820312 C 278.636719 272.820312 281.730469 271.707031 284.078125 269.480469 C 289.027344 264.78125 289.398438 256.988281 284.699219 252.042969 L 212.226562 174.253906 C 209.875 171.78125 206.660156 170.296875 203.199219 170.296875 C 199.734375 170.296875 196.519531 171.78125 194.171875 174.253906 L 121.699219 252.042969 C 117 256.988281 117.371094 264.902344 122.316406 269.480469 C 127.511719 274.179688 135.300781 273.808594 140 268.863281 Z M 140 268.863281 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" /></g></svg>
			</a>

			<?php
				if ($_COOKIE["sessionkey"]) {
			?>
				<a href="index.php?logout=logout">
					<div class="button button_signIn">Выйты</div>
				</a>
			<?php } else { ?>
				<a href="register.php">
					<div class="button button_signIn">Войти</div>
				</a>
			<?php } ?>
		</div>
		<?php if($_COOKIE["sessionkey"]){echo ('<a href="admin.php" rel="noreferrer noopener">' . $_COOKIE["name"] . ' <span style="color: #666666">(Админка)</span> </a>');} ?>
		<hr>
		<a href="#" rel="noreferrer noopener">О приложении</a>
		<a href="#" rel="noreferrer noopener">Контакты</a>
		<a href="#" rel="noreferrer noopener">Руководство по предоставлению персональных данных</a>
		<a href="#" rel="noreferrer noopener">Пользовательское соглашение</a>
		<a href="#" rel="noreferrer noopener">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
	</main>
	<div class="menuShadw"></div>
</div>

<script>
	var burger = document.getElementsByClassName("burger")[0];
	var menuShadw = document.getElementsByClassName("menuShadw")[0];
	var menuLeftWrap = document.getElementsByClassName("menuLeftWrap")[0];
	burger.addEventListener('click', function () {togleBurgerMenu() });
	menuShadw.addEventListener('click', function () {togleBurgerMenu() });

	function togleBurgerMenu () {
		burger.classList.toggle("burger_close");
		menuLeftWrap.classList.toggle("menuLeft_active");
	}
	function like(id_article) {
		const XHR = new XMLHttpRequest();
		XHR.open( 'POST', 'like.php' );
		XHR.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		XHR.send( `id_article=${ id_article }` );
		XHR.onload = function() {
			document.getElementsByClassName('likeWrap')[0].classList.add("likeOk");
		};
	}
	document.getElementById("svg_files").style = "display:block;"
</script>