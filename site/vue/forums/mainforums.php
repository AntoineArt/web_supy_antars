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
	<div id='page'>

		<?php /*=====MAIN=====*/ ?>

		<div id='forum_creer'>
			<a href='_main.php?section=nouveauBillet'>Nouveau billet</a>
		</div>

		<div id='forum'>

			<?php
			foreach($billets as $billet){?>
				<div class='billet'>
					<div class='nom_billet'><?php echo $billet['titre'];?></div>
					<div class='infos_billet'>Par <a href="_main.php?section=commentairesUtilisateur&amp;pseudo=<?php echo $billet['auteur'];?>"><strong><?php echo $billet['auteur'];?></strong></a> le <?php echo $billet['date_fr']; ?></div>
					<br/>
					<a href="_main.php?section=commentairesBillet&amp;billet=<?php echo $billet['id'];?>&amp;titre=<?php echo $billet['titre'];?>">Voir la discussion</a>
					<hr/>
					<p> <?php echo nl2br($billet['contenu']); ?> </p>
				</div>
			<?php
			}?>
		</div>

		<?php /*=====FOOTER=====*/ ?>
		<?php include('./vue/components/footer.php'); ?>

	</div>
</body>
</html>
