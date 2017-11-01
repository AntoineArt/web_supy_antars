<?php
/*
	Auteur: Frapiccini Benoît
	Ce code correspond à la page d'accueil, qui compte la page de connexion.
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel='stylesheet' href='./vue/stylesheet.css' />
	<title>JDR</title>
</head>

<body id='mainpage'>

	<div id='main'>

		<?php if(!isset($_SESSION['pseudo'])){
			//L'utilisateur n'est pas connecté ; il ne voit que l'écran de connexion ?>

			<div id='center'>
				<header>
					<img id='avatar' src="./ressources/images/mainpage.jpeg" />
					<h1>Mechs VS Wartz</h1>
				</header>

				<br><hr/ ><br>

				<h2>Identification</h2>
				<div class='error'> <?php if (isset($_SESSION['error'])){echo $_SESSION['error'];} ?></p> </div>
				<form action='_main.php?section=mainpage' method='post'>
					<div class='field'>
						<input class='textbox' type='text' name='pseudo' id='pseudo' placeholder='Pseudo' />
					</div>
					<br>
					<div class='field'>
						<input class='textbox' type='password' name='mdp' id='password' placeholder='Password' />
					</div>
					<br>
					<div class='checkbox'>
						<input class='checkbox' type='checkbox' name='autoconnect' /> Connexion auto
					</div>
					<br>
					<br>
					<div class='button'>
						<input class='submitbutton' type='submit' value='Valider' />
					</div>
					<br>
				</form>

				<br><hr /><br>

				<a href='_main.php?section=inscription' title="Si vous n'avez pas de compte !">Pas de compte ?</a>
			</div>
		<?php }

		else{
			//L'utilisateur est connecté ; il voit l'ensemble de l'interface ?>

			<div id='left'>
				<nav id='navigation'>
					<a href='./_main.php?section=mainwiki' title='Pour en apprendre plus sur ce monde fantastique !'>Wiki</a>
					<a href='./_main.php?section=mainforums' title="Pour partager vos expériences avec d'autres aventuriers !">Forums</a>
					<a href='./_main.php?section=mainplayground' title='Pour en apprendre plus sur ce monde fantastique !'>Contacts</a>
				</nav>

				<div id='extraitsForums'>
				</div>
			</div>

			<div id='center'>
				<header>
					<img id='avatar' src='./ressources/images/mainpageAvatar.jpeg'/>
					<h1>Mechs VS Wartz</h1>
				</header>

				<hr/ >

				<div id=''>
					<a href='_main.php?section=playground'>Enter Playground</a>
				</div>
				<div id='deconnexion'>
					<a href='_main.php?section=deconnexion'>Déconnexion</a>
				</div>

				<hr />
			</div>

			<div id='right'>
				<div id='alerte'>
				</div>

				<div id='extraitsMessagerie'>
				</div>
			</div>

		<?php } ?>

	</div>

	<footer id="footer">
		<div id="copyright">&copy; Supytalp & Antar_s</div>
	</footer>

</body>
</html>
