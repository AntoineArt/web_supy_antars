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

		<h2 class=nom_billet><?php echo $_SESSION['titre_billet']; ?></h2>

		<div id='commentaires'>
			<?php
			foreach($commentaires as $commentaire){?>
			<div id=<?php echo $commentaire['id'];?>>
				<div class="commentaire">
					<div >
						<img id='avatar' src="ressources/avatars/<?php echo $commentaire['auteur'];?>.jpeg" alt="<?php echo $commentaire['auteur']; ?>"/>
					</div>

					<div class='commentaire_infos'>
						Par <a href="_main.php?section=commentaires_utilisateur&amp;pseudo=<?php echo $commentaire['auteur'];?>"><strong><?php echo $commentaire['auteur'];?></strong></a>
						<br /><?php $date=new DateTime($commentaire['date_fr']); echo $date->format('\l\e d-m-Y'); echo ('<br />'); echo $date->format('à H:i'); ?>
					</div>

					<hr />

					<div class='commentaire_contenu'><?php echo nl2br($commentaire['contenu']); ?></div>
				</div>
			</div>

			<?php	}?>
			
	</div>

	<div id='commentaire_creer'>
		<a href="_main.php?section=nouveau_commentaire&amp;billet=<?php echo $_SESSION['id_billet']; ?>&amp;titre=<?php echo $_SESSION['titre_billet'];?>">Nouveau commentaire</a>
	</div>

	<?php /*=====FOOTER=====*/ ?>
	<?php include('./vue/components/footer.php'); ?>

</div>
</body>
</html>
