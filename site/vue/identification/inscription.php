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
				<?php
				if($_SESSION['error']==1){?>
				<div class="error"><p>Informations erronées !</p></div>
				<?php
				}?>
				<?php
				if($_SESSION['error']==1){?>
				<div class="error"><p>Ce pseudo est déjà utilisé !</p></div>
				<?php
				}?>
				<p> Pseudo <input type="text" name="pseudo" /> </p>
				<?php
				if($_SESSION['error']==2){?>
				<div class="error"><p>Les mots de passe doivent être identiques !</p></div>
				<?php
				}?>
				<p> Mot de passe <input type="password" name="mdp" /> </p>
				<p> Répéter mot de passe <input type="password" name="mdp2" /> </p>
				<?php
				if($_SESSION['error']==3){?>
				<div class="error"><p>L'adresse mail doit être valide !</p></div>
				<?php
				}?>
				<p> Adresse mail <input type="text" name="email" /> </p>
				<p> <input type="submit" value="Valider" /> </p>
			</form>
		</section>

		<?php /*=====FOOTER=====*/ ?>
		<?php include("./vue/components/footer.php"); ?>

	</div>
</body>
</html>
