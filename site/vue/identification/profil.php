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

				<div class='error'> <?php if (isset($_SESSION['error'])){echo $_SESSION['error'];} ?></p> </div>

				<form action='_main.php?section=profil' method='post'>
					<p> Pseudo <input type='text' name='pseudo' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post'>
					<p> Mot de passe <input type='password' name='mdp' /> </p>
					<p> Répéter mot de passe <input type='password' name='mdp2' /> <input type='submit' value='Valider' /> </p>
				</form>
					<p> Adresse mail <input type='text' name='email' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post' enctype="multipart/form-data">	
     				<input type="hidden" name="MAX_FILE_SIZE" value="100000">
    				Fichier : <input type="file" name="avatar">
    				<input type="submit" value="Valider">
				</form>
			</div>
		</section>

		<?php /*=====FOOTER=====*/ ?>
		<?php include('./vue/components/footer.php'); ?>

	</div>
</body>
</html>
