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
		<?php echo $_SESSION["titre_billet"]; ?>
	</title>
</head>

<body>
	<div id="page">

		<?php /*=====HEADER=====*/ ?>
		<?php include('vue/components/header.php'); ?>

		<?php /*=====NAVIGATION=====*/ ?>
		<?php include('./vue/components/navigation.php'); ?>

		<?php /*=====MAIN=====*/ ?>

		<h2><?php echo $_SESSION['titre_billet']; ?></h2>

		<div id='commentaires'>
			<?php
			foreach($commentaires as $commentaire){?>
			<div class="commentaire">
				<div class='infos_commentaire'>Par <strong><?php echo $commentaire['auteur'];?></strong> le <?php echo $commentaire['date_fr']; ?></div>
				<div class='contenu_commentaire'><p> <?php echo nl2br($commentaire['contenu']); ?> </p></div>
				<hr/>
			</div>
			<?php
		}?>
	</div>

	<div id='commentaire_creer'>
		<a href="_main.php?section=nouveau_commentaire&amp;billet=<?php echo $_SESSION['id_billet']; ?>&amp;titre=<?php echo $_SESSION['titre_billet'];?>">Nouveau commentaire</a>
	</div>

	<?php /*=====FOOTER=====*/ ?>
	<?php include('./vue/components/footer.php'); ?>

</div>
</body>
</html>
