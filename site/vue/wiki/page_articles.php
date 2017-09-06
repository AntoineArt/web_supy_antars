<?php
/*
	Auteur : Artillan Antoine
	Cette page regroupe
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

			<?php if($_SESSION['article_wiki']=="mainwiki"){ ?>
			<h1 class="titre">WikiHub</h1>
			<div id="choix_section">
				
			</div>
			<?php } ?>

			<?php /*=====FOOTER=====*/ ?>
			<?php include('./vue/components/footer.php'); ?>
		</div>
	</body>
</html>
