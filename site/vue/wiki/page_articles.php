<?php
/*
	Auteur : Artillan Antoine
	Cette page regroupe les différents articles de la section sélectionnée
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>
			<?php echo $_SESSION["article_wiki"] ?>
		</title>
	</head>

	<body>
		<div id="page">
			<?php /*=====HEADER=====*/ ?>
			<?php include('vue/components/header.php'); ?>

			<?php /*=====NAVIGATION=====*/ ?>
			<?php include('./vue/components/navigation.php'); ?>

			<?php /*=====MAIN=====*/ ?>

			<h1 class="titre">WikiHub</h1>
			<div id="choix_article">
				<?php foreach ($articles as $article): ?>
					<h2><a href="controleur/wiki/article.php?id_article=<?php echo $article['id']; ?>"></a></h2>
				<?php endforeach;? ?>
			</div>
			<?php } ?>

			<?php /*=====FOOTER=====*/ ?>
			<?php include('./vue/components/footer.php'); ?>
		</div>
	</body>
</html>
