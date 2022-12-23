<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/simpleusers/su.inc.php");

	$SimpleUsers = new SimpleUsers();

	if( !$SimpleUsers->logged_in )
	{
		header("Location: index.php");
		exit;
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SCT Admin Login</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
		<script src="js/jscolor.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>
    <body>
        <div class="container">


			<header>



			</header>

<?php if (isset($_POST['cc']) && isset($_POST['cu']) && isset($_POST['type'])) {
 $name=$_POST['cu'];
 $color=$_POST['cc'];
 $type=$_POST['type'];
 $SimpleUsers->addColor($name, $color, $type);
 echo "Couleur unis ajouter avec succes";
}?>

	<section class="main">
				<form class="form-2"  method="post" action="">
				    <h1>	</h1>
				    <p>
				        <label for="cc">Code Unis</label>
				        <input type="text" name="cu" required>
				    </p>
				    <p>
				        <label for="type">Type</label>
				        <select name="type">
				        <option value="com">Sur commande</option>
				        <option value="stk">En stock</option>
				        </select>
				    </p>
<p>
				        <label for="cc">Code RGB</label>

				        <input  class="color" type="text" name="cc" value="66ff00" required>
				    </p>
				    <p>
				        <input type="submit" name="submit" value="Ajouter">
				    </p>
				</form>
			</section>
</div>
    </body>
</html>