<?php
/*
	Auteur : Artillan Antoine
	Hub du wiki, elle recense les différentes sections
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="vue/stylesheet.css" />
		<title>
			Sections
		</title>
	</head>

	<body>
		<div id="page">
			<?php /*=====HEADER=====*/ ?>
			<?php include('vue/components/header.php'); ?>

			<?php /*=====NAVIGATION=====*/ ?>
			<?php include('./vue/components/navigation.php'); ?>

			<?php /*=====MAIN=====*/ ?>
			<?php if(!isset($_GET['id_section_wiki']) OR !isset($_GET['article'])){ ?>
				<h1 class="titre">WikiHub</h1>
				<div id="choix_section">
					<?php foreach ($sections as $section): ?>
						<h2><a href="controleur/wiki/mainwiki.php?id_section_wiki=<?php echo $section['id'];?>"> <?php echo $section['description'];?></a></h2>
					<?php endforeach; ?>
				</div>
			<?php }

		else{
			foreach ($articles as $article): ?>
				<h2><a href="controleur/wiki/page_articles.php?article=<?php echo $article['id'];?>"> <?php echo article['nom'] ?></a></h2>
			<?php endforeach; ?>
		<?php }?>


			<?php /*=====FOOTER=====*/ ?>
			<?php include('./vue/components/footer.php'); ?>
		</div>
	</body>
</html>
