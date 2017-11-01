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
			<?php include('vue/components/navigation.php'); ?>

			<?php /*=====MAIN=====*/ ?>
			<h1 class="titre">WikiHub</h1>
			<div id="choix_section">
				<?php foreach ($sections as $section): ?>
					<h2><a href="_main.php?section=pagewiki&amp;id_section_wiki=<?php echo $section['id'];?>"> <?php echo $section['description']; ?></a></h2>
				<?php endforeach; ?>
			</div>

			<?php /*=====FOOTER=====*/ ?>
			<?php include('vue/components/footer.php'); ?>
		</div>
	</body>
</html>
