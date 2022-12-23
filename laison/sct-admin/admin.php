<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/simpleusers/su.inc.php");

	$SimpleUsers = new SimpleUsers();

	// This is a simple way of validating if a user is logged in or not.
	// If the user is logged in, the value is (bool)true - otherwise (bool)false.
	if( !$SimpleUsers->logged_in )
	{
		header("Location: index.php");
		exit;
	}

	?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>ct-admin</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $('#elfinder').elfinder({
					url : 'php/connector.php'  // connector URL (REQUIRED)
					// lang: 'ru',             // language (OPTIONAL)
				}).elfinder('instance');
				$kt= $('.elfinder-button-icon-help');
				$kt.parent().hide();
			});
		</script>
	</head>
	<body>
	<?php
// If the user is logged in, we can safely proceed.
	$users = $SimpleUsers->getUsers();
	foreach( $users as $user ): ?>


<a href="changepassword.php?userId=<?php echo $user["userId"]; ?>">Change password</a>

				<?php endforeach; ?>
				<a href="colors.php">Ajouter une couleur uni</a>
				<a href="unismotif.php">Ajouter les unis pour un motif/bordure</a>

				<a href="logout.php"> Logout</a>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
