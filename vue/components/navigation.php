<nav>
	<p><a href="./_main.php?section=mainwiki" title="Pour en apprendre plus sur ce monde fantastique !">Wiki</a></p>
	<p><a href="./_main.php?section=mainforums" title="Pour partager vos expériences avec d'autres aventuriers !">Forums</a></p>
	<p><a href="./_main.php?section=maincommunaute" title="Pour découvrir les derniers fan arts !">Communauté</a></p>

	<?php
	if(!isset($_SESSION['pseudo'])){
	?>
		<p>
			<a href="./_main.php?section=connexion" title="T'es qui au juste ?">Login</a>
		</p>
	<?php
	}
	else{
	?>
		<p>
			<a href="./_main.php?section=profil" title=Hello you !><?php echo($_SESSION['pseudo']); ?></a>
			<a href="./_main.php?section=deconnexion" title="Bye :D">(Déconnexion)</a>
		</p>
	<?php
	}
	?>

</nav>