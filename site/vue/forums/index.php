<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à l'index du forum.

	/!\ Il ne doit être appelé que par son controleur (usage de $billets) !
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>Forums</title>
	</head>

	<body>
		<div id="page">

			<?php /*=====HEADER=====*/ ?>
			<?php include("vue/components/header.php"); ?>

			<?php /*=====NAVIGATION=====*/ ?>
        	<?php include("./vue/components/navigation.php"); ?>


			<?php /*=====MAIN=====*/ ?>
			<div id="forum">
	        	<!--<h1>Liste des sujets du forum :</h1>-->
					<?php
					foreach($billets as $billet){?>
						<div class="post">
						    <div class="nom_post"> <?php echo $billet['titre'];?> </div>
						    <div class="infos_post"><?php echo $billet['date_fr']; ?></div>
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