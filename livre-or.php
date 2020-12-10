<?php
	if(!isset($_SESSION['login'])){
		$_SESSION['connected'] = 'Vous devez être connecté pour poster un commentaire';
	}
	else{$_SESSION['connected'] = '';}
?>

<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Livre d'or</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="mainlivreor">
			<?php 
				// echo '<h2>'.$_SESSION['connected'].'</h2>';
				
				$table = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC');
				
				while($ligne = $table->fetch_assoc()){
					$table2 = $bdd->query('SELECT login FROM utilisateurs WHERE id = "'.$ligne['id_utilisateur'].'"');
					
					echo '<p>Posté le '.$ligne['date'].'</p></div>';
					
					while($ligne2 = $table2->fetch_assoc()){
						echo '<div class="commentaire"><u><h3>Par : '.$ligne2['login'].'</h3></u>';
					}
					
					echo '<h3>'.$ligne['commentaire'].'</h2>';
					echo '<style> .mainlivreor h3 {font-family: police1; margin-left: 10%;} .mainlivreor p{font-size: 0.8em; margin-left: 30%; background-color: black; color: white;}</style><hr>';
					echo '<style> .commentaire{width: 100%; height: 30%; position : relative; top: 0;}</style>';
				}
			?>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>