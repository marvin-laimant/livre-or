<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Livre d'or</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="maincommentaire">
			<form method="post">
				<label for="com">Commentaire : </label>
					<textarea required name="com" maxlength="255"></textarea>
				<input type="submit" name="postcom" value="Commenter"/>
			</form>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	date_default_timezone_set('Europe/Paris');
	
	if(isset($_POST['postcom'])){
		if(!empty($_POST['com'])){
			$table = $bdd->query('SELECT id FROM utilisateurs WHERE login = "'.$_SESSION['login'].'"');
			
			while($ligne = $table->fetch_assoc()){
				$_SESSION['id'] = $ligne['id'];
			}
			
			$table2 = $bdd->prepare('INSERT INTO commentaires(id_utilisateur) VALUE("'.$_SESSION['id'].'")');
			$table2->execute();
			
			$_SESSION['com'] = $_POST['com'];
			
			$date = date("ymdhis");
			
			$table3 = $bdd->prepare('INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES("'.$_SESSION['com'].'","'.$_SESSION['id'].'","'.$date.'")');
			$table3->execute();
			
			header('location: livre-or.php');
		}
	}
?>