<footer>
	<div id="footer_contact">
	    <h2>Contacts :</h1>
		<p><a href="mailto:antoine.artillan@telecomnancy.net" title="Un apprenti webmaster">antoine.artillan@telecomnancy.net</a></p>
		<p><a href="mailto:benoit.frapiccini@telecomnancy.net" title="Un platypus">benoit.frapiccini@telecomnancy.net</a></p>
	</div>
	<div id="footer_compteur">
		<?php
		$fichier = fopen('./data/compteur.txt', 'r+');
		$vues = fgets($fichier);
		$vues += 1;
		fseek($fichier, 0);
		fputs($fichier, $vues);
		fclose($fichier);
		?>
		<p>Cette page a été vue <?php echo $vues; ?> fois !</p>
	</div>
</footer>
