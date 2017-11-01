<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond aux commentaire de l'un des utilisateurs sur l'ensemble du forum
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="vue/stylesheet.css" />
	<title>
		<?php echo $pseudo; ?>
	</title>
</head>

<body>
	<div id='page'>

		<?php /*=====HEADER=====*/ ?>
		<?php include('vue/components/header.php'); ?>

		<?php /*=====NAVIGATION=====*/ ?>
		<?php include('./vue/components/navigation.php'); ?>

		<?php /*=====MAIN=====*/ ?>
		<div id='page_com_utilisateur'>
		<h2 class=nom_billet>Liste des commentaires : <?php echo $pseudo; ?></h2>
			<div id='commentaires'>
				<?php
				foreach($commentaires as $commentaire){?>
				<div class='commentaire'>
					<div class='commentaire_infos'>
						Par <strong><?php echo $commentaire['auteur'];?></strong>
						<br /><?php $date=new DateTime($commentaire['date_fr']); echo $date->format('\l\e d-m-Y'); echo ('<br />'); echo $date->format('à H:i'); ?>
					</div>
					<hr />
					<div class='commentaire_contenu'><?php echo nl2br($commentaire['contenu']); ?></div>
					<a href="_main.php?section=commentaires&amp;billet=<?php echo $commentaire['id_billet'];?>&amp;titre=<?php echo $commentaire['titre_billet'];?>#<?php echo $commentaire['id'];?>">Voir la discussion</a>
				</div>
				<?php	}?>
			</div>
		</div>

	<?php /*=====FOOTER=====*/ ?>
	<?php include('./vue/components/footer.php'); ?>

	</div>
</body>
</html>
