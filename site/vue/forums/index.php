<!--
	Auteur: Frapiccini Benoît
	Ce code html est la page d'index du forum.

	/!\ Ne peut être suivi que du controleur index.php (utilisation de la variable $billets) !
	/!\ L'id du billet est renvoyé dans l'URL !
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
			<div id="forum">
	        	<h1>Liste des sujets du forum :</h1> 
					<?php
					foreach($billets as $billet){?>
						<div class="post">
						    <h2>
						        <?php echo $billet['titre']; ?>
						        <em>le <?php echo $billet['date_fr']; ?></em>
						    </h2>
		    				<p>
						    	<?php echo $billet['contenu']; ?>
						    	<br />
						    	<a href="_main.php?section=billetsforums&amp;billet=<?php echo $billet['id']; ?>">Réponses</a>
						    </p>
						</div>
					<?php
					}?>
			</div>

		</div>
</body>
</html>