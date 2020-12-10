<?php
	session_start();
	ini_set('display_errors', 'off');
	$bdd = new mysqli('localhost', 'root', '', 'livreor');
	
	if($bdd->connect_errno){
		echo 'La connexion n\'a pas abouti'.$bdd->connect_errno.'|'.$bdd->connect_error;
	}
	
	$bdd->set_charset('utf8');
	
	echo $_SESSION['header'];
?>

<header>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li class="liinscription"><a href="inscription.php">Inscription</a></li>
			<li class="liconnexion"><a href="connexion.php">Connexion</a></li>
			<li class="licommentaire"><a href="commentaire.php">Commentaire</a></li>
			<li><a href="livre-or.php">Livre-or</a></li>
			<li class="liprofil"><a href="profil.php">Profil</a></li>
		</ul>
	</nav>
</header>