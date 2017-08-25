<!--
	Auteur: Frapiccini Benoît
	Ce code html est le formulaire d'inscription au site.
	Le formulaire est renvoyé directement au _main pour être traité par un controleur.
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>Login</title>
	</head>

	<body>
		<div id="page">

			<!--HEADER-->
			<?php include("vue/components/header.php"); ?>

		    <!--MAIN-->
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

		</div>
	</body>
</html>
