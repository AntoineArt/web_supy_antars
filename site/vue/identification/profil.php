<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à la page de profil
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="vue/stylesheet.css" />
	<title>Profil</title>
</head>

<body>
	<div id='page'>

		<?php /*=====HEADER=====*/ ?>
		<?php include('vue/components/header.php'); ?>

		<?php /*=====NAVIGATION=====*/ ?>
		<?php include('vue/components/navigation.php'); ?>


		<?php /*=====MAIN=====*/ ?>
		<section>
			<div id='profil'>
				<h1>Profil :</h1>
				<div class='error'>
					<?php
						switch($_SESSION['error']){
						case 1:
						?> <div class='error'><p>Erreur dans le traitement des informations !</p></div> <?php
						break;
						case 2:
						?> <div class='error'><p>Ce pseudo est déjà utilisé !</p></div> <?php
						break;
						case 3:
						?> <div class='error'><p>Les mots de passe doivent être identiques !</p></div> <?php
						break;
						case 4:
						?> <div class='error'><p>L'adresse mail doit être valide !</p></div> <?php
						break;
						}
					?>
				</div>
				<form action='_main.php?section=profil' method='post'>
					<p> Pseudo <input type='text' name='pseudo' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post'>
					<p> Mot de passe <input type='password' name='mdp' /> </p>
					<p> Répéter mot de passe <input type='password' name='mdp2' /> <input type='submit' value='Valider' /> </p>
				</form>
					<p> Adresse mail <input type='text' name='email' /> <input type='submit' value='Valider' /> </p>
				</form>
			</div>
		</section>

		<?php /*=====FOOTER=====*/ ?>
		<?php include('./vue/components/footer.php'); ?>

	</div>
</body>
</html>
