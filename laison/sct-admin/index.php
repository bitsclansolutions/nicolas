<?php


	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/simpleusers/su.inc.php");

	$SimpleUsers = new SimpleUsers();

	// Login from post data
	if( isset($_POST["username"]) )
	{

		// Attempt to login the user - if credentials are valid, it returns the users id, otherwise (bool)false.
		$res = $SimpleUsers->loginUser($_POST["username"], $_POST["password"]);
		if(!$res)
			$error = "You supplied the wrong credentials.";
		else
		{
				header("Location: admin.php");
				exit;
		}

	} // Validation end

?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(images/bg2.jpg) no-repeat center top;
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



	<section class="main">
				<form class="form-4"  method="post" action="">
				    <h1>	<?php if( isset($error) ): ?>

			<?php echo $error; ?>

		<?php endif; ?></h1>
				    <p>
				        <label for="login">Login</label>
				        <input type="text" name="username" placeholder="Username or email" required>
				    </p>
				    <p>
				        <label for="password">Mot de passe</label>
				        <input type="password" name='password' placeholder="Password" required>
				    </p>

				    <p>
				        <input type="submit" name="submit" value="Continue">
				    </p>
				</form>
			</section>
</div>
    </body>
</html>