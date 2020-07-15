<?php
include "includes/header.php";
if(!isset($_SESSION['username']))
{
?>




<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<style>
footer,header,.main{
    padding-left:300px;
}

@media(max-width:992px)
{
    footer,header,.main{
    padding-left:0px;
}
}
</style>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></head>

    <body style="background-image:url('../img/kakashi.jpg');
    background-size:cover">



<div class="row" style="margin-top:100px">
<div class="col l6 offset-l3 m8 offset-m2 s1">

<div class="card-panel center red " style="margin-botton:0px">
<ul class="tabs red  ">
<li class="tab">
<a href="#login" class="black-text">login</a>
</li>

<li class="tab">
<a href="#signup" class="black-text">Sign Up</a>
</li>
</ul>
</div>
</div>





<!-- sign up and login area-->
<div class="col l6 offset-l3 m8 offset-m2 s12" id="login">
<div class="card-panel center blue" style="margin-top:1px">
<!-- <h5> login to continue </h5>  -->
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<div class="input-field">
<form action="login_check.php" method="POST">
<input type="text" id="username" name="username" placeholder="Username"></div>

<div class="input-field">
<input type="password" name="password" placeholder="Password">
</div>
<input type="submit" name="login" class="btn black  " value="Login " ></form>
</div>
</div>








<div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">
<div class="card-panel center white " style="margin-top:1px">
<!---   <h5> Sign up now</h5>    --->
<form action="signup.php" method="POST">
<div class="input-field">
<input type="email" name="email" id="email" placeholder="Enter E-mail"
class="validate">
<label for="email" data-error="Invalid e-mail"
data-success="Valid E-mail"></label>
</div>


<div class="input-field">
<input type="text" id="username" name="username" placeholder="Username"></div>

<div class="input-field">
<input type="password" name="password" placeholder="Password">
</div>
<input type="submit" name="signup" class="btn red " value="Sign Up "></form>
</div>
</div>
</div>


<?php
include "includes/footer.php";
}
else
{
  header("Location: dashboard.php");
}
?>






     