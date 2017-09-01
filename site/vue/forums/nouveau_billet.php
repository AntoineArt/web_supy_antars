<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à la page de création d'un nouveau billet pour les forums.
	La taille du contenu est limitée à 5000 caractères.
*/
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>Nouveau billet</title>
	</head>

	<body>
		<div id="page">

			<?php /*=====HEADER=====*/ ?>
			<?php include("vue/components/header.php"); ?>

			<?php /*=====NAVIGATION=====*/ ?>
			<?php include("./vue/components/navigation.php"); ?>

			<?php /*=====MAIN=====*/ ?>
			<section>
				<form action="_main.php?section=nouveau_billet" method="post">
					<h1>Nouveau billet :</h1>
					<p> Titre (max:40char)<input type="text" name="titre" maxlength="40"/> </p>
					<p> Contenu (max:5000char)<br/><textarea name="contenu" rows="20" cols="100" maxlength="5000"></textarea></p>
					<p> <input type="submit" value="Valider" /> </p>
				</form>
			</section>

			<?php /*=====FOOTER=====*/ ?>
			<?php include("./vue/components/footer.php"); ?>

		</div>
	</body>
	</html>
