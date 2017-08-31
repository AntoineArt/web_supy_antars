<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à l'index du forum.

	/!\ Il ne doit être appelé que par son controleur (usage de $billets) !
	/!\ Pour l'affichage des commentaires, c'est l'id du billet qui est renvoyé !
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

			<div id="forum_creer">
				<?php
				if(isset($_SESSION['pseudo'])){?>
					<a href="_main.php?section=nouveau_billet">Nouveau billet</a>
				<?php
				}
				else{?>
					<a href="_main.php?section=connexion">Nouveau billet</a>
				<?php
				}?>
			</div>

			<div id="forum">

				<?php
				foreach($billets as $billet){?>
					<div class="post">
						<div class="nom_post"><?php echo $billet['titre'];?></div>
						<div class="infos_post">Par <strong><?php echo $billet['auteur'];?></strong> le <?php echo $billet['date_fr']; ?></div>
						<br/>
						<a href="_main.php?section=commentaires&amp;billet=<?php echo $billet['id'];?>&amp;titre=<?php echo $billet['titre'];?>">Réponses</a>
						<hr/>
						<p> <?php echo $billet['contenu']; ?> </p>
					</div>
				<?php
				}?>
			</div>

			<?php /*=====FOOTER=====*/ ?>
			<?php include("./vue/components/footer.php"); ?>

		</div>
</body>
</html>