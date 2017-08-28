<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond aux commentaire de l'un des billets
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>
			<?php //On utilise le GET si accès direct, ou le SESSION si retour depuis un nouveau commentaire
			if (isset($_GET["titre"])){
				echo $_GET["titre"];
			}
			else{
				echo $_SESSION["titre_billet"];
			}
			?>
		</title>
	</head>

	<body>
		<div id="page">

			<?php /*=====HEADER=====*/ ?>
			<?php include("vue/components/header.php"); ?>

			<?php /*=====NAVIGATION=====*/ ?>
        	<?php include("./vue/components/navigation.php"); ?>

			<?php /*=====MAIN=====*/ ?>

			<div id="forum">
				<?php
				foreach($commentaires as $commentaires){?>
					<div class="commentaire">
						<div class="infos_commentaire">Par <strong><?php echo $commentaires['auteur'];?></strong> le <?php echo $commentaires['date_fr']; ?></div>
						<div class="contenu_commentaire"><p> <?php echo $commentaires['contenu']; ?> </p></div>
						<hr/>
					</div>
				<?php
				}?>
			</div>

			<div id="commentaire_creer">
				<?php
				if(isset($_SESSION['pseudo'])){?>
					<a href="_main.php?section=nouveau_commentaire&amp;billet=<?php echo $_GET['billet']; ?>&amp;titre=<?php echo $_GET['titre'];?>">Nouveau commentaire</a>
				<?php
				}
				else{?>
					<a href="_main.php?section=connexion">Nouveau commentaire</a>
				<?php
				}?>
			</div>

			<?php /*=====FOOTER=====*/ ?>
			<?php include("./vue/components/footer.php"); ?>

		</div>
</body>
</html>