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
				<h1>Profil : <?php echo($_SESSION['pseudo']); ?></h1>
				<div >
					<img id='avatar' src="ressources/avatars/<?php echo $_SESSION['pseudo'];?>.jpeg" alt="<?php echo $_SESSION['pseudo']; ?>"/>
				</div>

				<div class='error'> <?php if (isset($_SESSION['error'])){echo $_SESSION['error'];} ?></p> </div>

				<form action='_main.php?section=profil' method='post'>
					<h2>Changer de pseudo:</h2>
					<p>Nouveau pseudo <input type='text' name='pseudo' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post'>
					<h2>Changer de mot de passe:</h2>
					<p>Nouveau mdp <input type='password' name='mdp' /> </p>
					<p>Répéter mdp <input type='password' name='mdp2' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post'>
					<h2>Changer d'adresse mail:</h2>
					<p> Nouvelle adresse <input type='text' name='email' /> <input type='submit' value='Valider' /> </p>
				</form>
				<form action='_main.php?section=profil' method='post' enctype="multipart/form-data">	
					<h2>Changer d'avatar:</h2>
					<p>(Le changement peut prendre quelques minutes à être effectif)</p>
     				<input type="hidden" name="MAX_FILE_SIZE" value="200000">
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
