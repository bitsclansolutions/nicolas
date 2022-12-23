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
		<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
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

<?php if (isset($_POST['name']) && isset($_POST['mtifunis']) ) {
 $name=$_POST['name'];
 $color=$_POST['mtifunis'];
 $SimpleUsers->addColorMotif($name, $color);
 echo "Couleur unis ajouter avec succes au element";
}?>

	<section class="main">
				<form class="form-2"  method="post" action="">
				    <h1>	</h1>
				    <p>
				        <label for="cc">Ref motif/bordure</label>
				        <input type="text" name="name" required>
				    </p>
				    <p>
				        <label for="type">Couleurs</label>
				         <table>
                            <tbody>
<tr>     <td style="background: #fdd34b" class="palette-color cuz" original-title="U4 jaune"></td>
    <td style="background: #f9c555" class="palette-color cuz" original-title="u24 ocre jaune"></td>
    <td style="background: #f3edcd" class="palette-color cuz" original-title="U3 jaune clair"></td>
    <td style="background: #f6f6f6" class="palette-color cuz" original-title="U8 blanc"></td>
    <td style="background: #f7e7c6" class="palette-color cuz" original-title="U16 saumon"></td></tr><tr>
    <td style="background: #8f8734" class="palette-color cuz" original-title="U31 vert kaki"></td>
    <td style="background: #679e4b" class="palette-color cuz" original-title="U6 vert"></td>
    <td style="background: #a2a884" class="palette-color cuz" original-title="U26 vert de gris"></td>
    <td style="background: #92a53a" class="palette-color cuz" original-title="U29 vert amande"></td>
    <td style="background: #93987a" class="palette-color cuz" original-title="U36 vert mousse"></td>
</tr><tr>
                                <td style="background: #bca68e" class="palette-color cuz" original-title="U18 marron glacé"></td>
    <td style="background: #d96453" class="palette-color cuz" original-title="U2 rouge"></td>
    <td style="background: #725f51" class="palette-color cuz" original-title="U37 kaki brun"></td>
    <td style="background: #d3babd" class="palette-color cuz" original-title="U14 aubergine"></td>
    <td style="background: #ebdcbb" class="palette-color cuz" original-title="U30 camel"></td> </tr><tr>
    <td style="background: #2a373f" class="palette-color cuz" original-title="U9 noir"></td>
    <td style="background: #696b68" class="palette-color cuz" original-title="U32 gris anthracite"></td>
    <td style="background: #a8a8a6" class="palette-color cuz" original-title="U27 gris foncé"></td>
    <td style="background: #d8d8d8" class="palette-color cuz" original-title="U11 gris"></td>
    <td style="background: #dad4c6" class="palette-color cuz" original-title="U12 gris ancien"></td>
</tr><tr>
                                <td style="background: #01648b" class="palette-color cuz" original-title="U28 bleu petrole"></td>
    <td style="background: #4692c6" class="palette-color cuz" original-title="U23 outre mer"></td>
    <td style="background: #bedeed" class="palette-color cuz" original-title="U7 bleu"></td>
    <td style="background: #99c7e8" class="palette-color cuz" original-title="U35 bleu céladon"></td>
    <td style="background: #7198b9" class="palette-color cuz" original-title="U34 bleu jean"></td> </tr>
    <tr>
    <td style="background: #a91c22" class="palette-color cuz" original-title="u22 rouge foncé"></td>

<td style="background: #794f3f" class="palette-color cuz" original-title="U19 brun foncé"></td>


                       </tbody>
                          </table>

                  <ul></ul>
                  <input type="hidden" name="mtifunis" id="motifunis">
				    <p>
				        <input type="submit" name="submit" value="Ajouter">
				    </p>
				</form>
			</section>
</div>
<script type="text/javascript">
	$(function() {


		$( "form" ).submit(function( event ) {
			$('#motifunis').val('<ul>'+$("ul").html()+'</ul>');

});
		$('table td').live('click', function (e) {
			$('#motifunis').val('<ul>'+$("ul").html()+'</ul>');
			$("ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: "+$(this).css('background-color')+"; ' class='colorchoisiaff' ></div>" +$(this).attr('original-title')+" <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> supprimer</span></a></li>");
			var seen = {};
			$('ul li').each(function() {
			    var txt = $(this).text();
			    if (seen[txt])
			        $(this).remove();
			    else
			        seen[txt] = true;
			});
			});




	});
	</script>
    </body>
</html>