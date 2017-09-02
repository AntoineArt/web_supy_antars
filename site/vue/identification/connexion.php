<?php
/*
Auteur: Frapiccini Benoît
Ce code correspond à la page de connexion.
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="vue/stylesheet.css" />
	<title>Connexion</title>
</head>

<body>
	<div id='page'>

		<?php /*=====HEADER=====*/ ?>
		<?php include('vue/components/header.php'); ?>

		<?php /*=====NAVIGATION=====*/ ?>
		<?php include('vue/components/navigation.php'); ?>


		<?php /*=====MAIN=====*/ ?>
		<section>
			<form action='_main.php?section=connexion' method='post'>
				<h1>Connexion :</h1>
				<?php
					if($_SESSION['error']==1){
					?> <div class='error'><p>Informations erronées</p></div> <?php
					}
				?>
				<p> Pseudo <input type='text' name='pseudo' /> </p>
				<p> Mot de passe <input type='password' name='mdp' /> </p>
				<p> Connexion auto <input type='checkbox' name='autoconnect' /> </p>
				<p> <input type='submit' value='Valider' /> </p>
				<p><a href='_main.php?section=inscription' title="Si vous n'avez pas de compte !">Pas de compte ?</a> </p>
			</form>
		</section>

		<?php /*=====FOOTER=====*/ ?>
		<?php include('./vue/components/footer.php'); ?>

	</div>
</body>
</html>