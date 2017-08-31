<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à la page d'inscription.
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>Inscription</title>
	</head>

	<body>
		<div id="page">

			<?php /*=====HEADER=====*/ ?>
			<?php include("vue/components/header.php"); ?>

			<?php /*=====NAVIGATION=====*/ ?>
        	<?php include("./vue/components/navigation.php"); ?>


		    <?php /*=====MAIN=====*/ ?>
		    <section>
				<form action="_main.php?section=inscription" method="post">
					<h1>Inscription :</h1>
					<p> Pseudo <input type="text" name="pseudo" /> </p>
				    <p> Mot de passe <input type="password" name="mdp" /> </p>
				    <p> Répéter mot de passe <input type="password" name="mdp2" /> </p>
				    <p> Adresse mail <input type="text" name="email" /> </p>
				    <p> <input type="submit" value="Valider" /> </p>
				</form>
			</section>

			<?php /*=====FOOTER=====*/ ?>
			<?php include("./vue/components/footer.php"); ?>

		</div>
	</body>
</html>