<?php
	include "connect.php";
	$query =  "SELECT * FROM article WHERE 1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();

	global $title;       $title = "";
	global $description; $description = "";
	global $keywords;    $keywords = "";

	include "header.php";

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

	include "header.php";
	echo ("<section class='container_article'><div class='head'><img src='" . $row['img_head'] . "'/><div class='blekFone'><h1>" . $row['title'] . "</h1></div></div><p>" . $row['body'] . "</p> <div class='bottom_article'> <div class='panel'> <div class='share'><div class='uSocial-Share' data-pid='860020081a5b9479d854655b8e6ac331' data-type='share' data-options='round-rect,style1,default,absolute,horizontal,size32,eachCounter0,counter0,nomobile' data-social='fb,vk,spoiler'></div></div> <div onclick='like(" . $row['id_article'] . ")' class='likeWrap'> <svg  id='like1' viewBox='0 -28 512.00002 512' xmlns='http://www.w3.org/2000/svg'><path d='m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0'/></svg> <svg id='like2' viewBox='0 -28 512.001 512' xmlns='http://www.w3.org/2000/svg'><path d='m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0'/></svg> </div> <div class='likeNumber'>" . $row['like_8f6b4n5m6'] . "</div> </div> <div class='author'>" . $row['name'] . "  " . $row['date'] . "</div></div> <hr>");

	$result->free();

?>
</section>
<script async  data-script="usocial" charset="utf-8">"init"!==window._uSocialTool&&void 0===window._uSocialTool&&(window._uSocialTool="init",usclUtility={tool:{checkIE:function(){return Boolean(document.all&&(!document.documentMode||document.documentMode&&document.documentMode<10))},hasObj:function(t,n){return void 0!==t&&null!=t&&(null==n||n in t)},closestParent:function(t,n){if(!t.classList.contains(n))for(;(t=t.parentElement)&&!t.classList.contains(n););return t},checkInObject:function(t,n){var i=null;for(var e in t)if(t.hasOwnProperty(e)){if(e===n){i=t[e];break}if(t[e]&&"object"==typeof t[e]){var o=this.checkInObject(t[e],n);if(o){i=o;break}}}return i},bitShiftByKey:function(t,n){for(var i="",e=0;e<t.length;e++){var o=n.substr(-1);i+=String.fromCharCode(t[e].charCodeAt(0)^o.charCodeAt(0)),n=o+n.substr(0,n.length-1)}return i},getVersion:function(t){var n="";return void 0!==t&&(n=String("?v="+t)),n},randomString:function(t){for(var n="0123456789",i="",e=0;e<t;e++){var o=Math.floor(Math.random()*n.length);i+=n.substring(o,o+1)}return i},isNumeric:function(t){return!isNaN(parseFloat(t))&&isFinite(t)}}});var usclHost=function(){function o(t){var n=t?t.getAttribute("src").split("/"):null;return[].concat(n[0],n[1],n[2]).join("/")}return{init:function(){var t,n=document.querySelector("script[data-script=usocial]")||!1,i=document.querySelector("[data-uscl-host]")||!1;return n?o(n):i?(t=i)?t.getAttribute("data-uscl-host"):"":function(){for(var t,n=document.querySelectorAll("script[src]")||[],i=n.length-1;0<=i;i--){var e=n[i].getAttribute("src")||"";/usocial\./.test(e)&&(t=o(n[i]),n[i].dataScript="usocial")}return t}()}}}(),checkDevice={device:{userAgent:window.navigator.userAgent.toLowerCase(),ios:function(){return this.iphone()||this.ipod()||this.ipad()},mobileSafari:function(){return/safari/.test(navigator.userAgent.toLowerCase())&&!/chrome/.test(navigator.userAgent.toLowerCase())},mobileChrome:function(){return/chrome/.test(navigator.userAgent.toLowerCase())&&!/version/.test(navigator.userAgent.toLowerCase())},iphone:function(){return this.find("iphone")},ipod:function(){return this.find("ipod")},ipad:function(){return this.find("ipad")},android:function(){return this.find("android")},androidVersion:function(){return navigator.userAgent.toLowerCase().match(/android (\d+(?:\.\d+)?)/)[0].replace("android ","")},androidPhone:function(){return this.android()&&this.find("mobile")},androidTablet:function(){return this.android()&&!this.find("mobile")},blackberry:function(){return this.find("blackberry")||this.find("bb10")||this.find("rim")},blackberryPhone:function(){return this.blackberry()&&!this.find("tablet")},blackberryTablet:function(){return this.blackberry()&&this.find("tablet")},windows:function(){return this.find("windows")},windowsPhone:function(){return this.windows()&&this.find("phone")},windowsTablet:function(){return this.windows()&&this.find("touch")},fxos:function(){return this.find("(mobile; rv:")||this.find("(tablet; rv:")},fxosPhone:function(){return this.fxos()&&this.find("mobile")},fxosTablet:function(){return this.fxos()&&this.find("tablet")},mobile:function(){return this.androidPhone()||this.iphone()||this.ipod()||this.windowsPhone()||this.blackberryPhone()||this.fxosPhone()},tablet:function(){return this.ipad()||this.androidTablet()||this.blackberryTablet()||this.windowsTablet()||this.fxosTablet()},portrait:function(){return window.innerHeight>window.innerWidth},landscape:function(){return window.innerHeight<window.innerWidth},find:function(t){return-1!==this.userAgent.indexOf(t)}}},scrollToTop=function(){function i(t,n){var i=document.documentElement;if(0===i.scrollTop){var e=i.scrollTop;++i.scrollTop,i=e+1===i.scrollTop--?i:document.body}!function(t,n,i,e){if(e<0)return;"object"==typeof n&&(n=n.offsetTop);"object"==typeof i&&(i=i.offsetTop);!function t(n,i,e,o,r,u,a){if(o<0||1<o||r<=0)return;n.scrollTop=i-(i-e)*a(o);o+=r*u;setTimeout(function(){t(n,i,e,o,r,u,a)},u)}(t,n,i,0,1/e,20,o)}(i,i.scrollTop,t,n)}function o(t){return--t*t*t+1}return{init:function(t,n){i(t,n)}}}(),sendEventRequest={init:function(t,n,i){!function(t,n){var i=new("onload"in new XMLHttpRequest?XMLHttpRequest:XDomainRequest);void 0===n.url&&(n.url=document.URL);var e=n;e.type=t,i.open("POST",usclHost.init()+"/logs/event-handler",!0),i.onload=function(){},i.onerror=function(){},i.send(JSON.stringify(e))}(t,n)}},uSocial=function(t){var n,i,e,o=0;function r(t,n,i){var e=document.createElement("script"),o=document.getElementsByTagName("body")[0],r=document.getElementsByTagName("head")[0];e.async=!0,e.type="text/javascript",e.charset="UTF-8",e.src=usclHost.init()+t+"?js="+n,void 0===o?r.appendChild(e):o.appendChild(e),e.onload=function(){i()}}function u(){n=0<document.querySelectorAll('[data-social][data-options][data-type="share"]').length,i=0<document.getElementsByClassName("uSocial-Like").length,e=setTimeout(function(){if(n||i)"init"!==window.uSocialShareInit&&void 0===window.uSocialShareInit&&n&&(window.uSocialShareInit="init",r("/usocial/usocial.share.js",t,function(){uSocialShare.init()})),"init"!==window.uSocialLikeInit&&void 0===window.uSocialLikeInit&&i&&(window.uSocialLikeInit="init",r("/usocial/usocial.like.js",t,function(){uSocialLike.init()}));else{if(1500===o)return clearTimeout(e),!1;o+=50,u()}},o)}return{init:function(){if(usclUtility.tool.checkIE()){document.onreadystatechange=function(){"complete"==document.readyState&&u()}}else"loading"==document.readyState?document.addEventListener("DOMContentLoaded",u):u()}}}("7.1.5");uSocial.init();</script>
<?php include "footer.php" ?>
HEREDOC2;
while ($row = $result->fetch_assoc()) {
	$nameFile = $row['linc'] . ".php";
	$fp = fopen($nameFile, 'w');

	$test = fwrite($fp, $text1 . $row['id_article'] . $text2);
	fclose($fp);
}

include "header.php";

?>
<h1>Thank! The article will be added after verification.</h1>

