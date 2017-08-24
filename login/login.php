<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../stylesheet.css"  />
		<title>Login</title>
	</head>

	<body>
		<div id="page">

			<p> Tu es <?php echo $_COOKIE['pseudo']; ?>

			<?php
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=WebSA;charset=utf8', 'root', 'root');
			}
			catch (Exception $e){
			        die('Erreur : ' . $e->getMessage());
			}
			?>

			<?php
			if (isset($_POST['identifiant']) AND $_POST['identifiant'] ==  "supytalp" AND $_POST['mdp'] AND $_POST['mdp'] ==  "platypus")
    		//LOGGED
    		{
    		?>
    			<h1>UN PLATYPUS SAUVAGE APPARAIT !</h1>
    			<figure>
    				<img src="../images/wartz.jpeg" alt="o3o" />
				</figure>
    			<?php
    		}

    		else
    		//NOT LOGGED
    		{
    		?>
				<!--HEADER-->
			    <?php include("../components/header.php"); ?>

		        <!--MAIN-->
		        <section>
					<form action="login.php" method="post">
						<h1>Connexion :</h1>
						<p> Identifiant <input type="text" name="identifiant" /> </p>
				    	<p> Mot de passe <input type="password" name="mdp" /> </p>
				    	<P> <input type="submit" value="Valider" /> </p>
					</form>
					<p><a href="inscription.php" title="Pour s'inscrire ...">S'inscrire</a></p>
				</section>
				<?php
			} ?>

		</div>
	</body>
</html>
