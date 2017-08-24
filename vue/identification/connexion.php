<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./vue/stylesheet.css"  />
		<title>Login</title>
	</head>

	<body>
		<div id="page">

			<!--HEADER-->
			<?php include("./vue/components/header.php"); ?>

		    <!--MAIN-->
		    <section>
				<form action="./controleur/identification/connexion.php" method="post">
					<h1>Connexion :</h1>
					<p> Pseudo <input type="text" name="pseudo" /> </p>
				    <p> Mot de passe <input type="password" name="mdp" /> </p>
				    <p> <input type="submit" value="Valider" /> </p>
				    <p><a href="./_main.php?section=inscription" title="Si vous n'avez pas de compte !">Pas de compte ?</a> </p>
				</form>
			</section>

		</div>
	</body>
</html>