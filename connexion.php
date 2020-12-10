<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Livre d'or</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="mainconnexion">
			<h2><u>Connexion</u></h2>
			<form method="post">
				<label for="login">Login : </label>
					<input required type="text" name="login" maxlength="255"/>
				<label for="password">Mot de passe : </label>
					<input required type="password" name="password" maxlength="255"/>
				<input name="connexion" type="submit" value="Connexion"/>
			</form>
			<p><?php echo $_SESSION['message']; ?></p>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	$table = $bdd->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'" AND password="'.$_POST['password'].'"');
	
	while($ligne = $table->fetch_assoc()){
		$_POST['login'] = $ligne['login'];
		$_POST['password'] = $ligne['password'];
	}
	
	if(!empty($_POST['login']) && !empty($_POST['password'])){
		if(mysqli_num_rows($table) == 0){
			$_SESSION['message'] = 'Login ou Mot de passe incorrect';
			header('refresh: 0');
		}
		else{
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['header'] = '<style>.liconnexion, .liinscription{position: absolute; z-index: -10; left: 2000px; opacity: 0;} .liprofil, .licommentaire{position: relative; z-index: 1; opacity: 1;}</style>';
			
			header('location: profil.php');
		}
	}
?>