<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Livre d'or</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="mainprofil">
			<h2>Bonjour <?php echo $_SESSION['login']; ?> !</h2>
			<form method="post">
				<input name="quit" type="submit" value="Déconnexion"/>
			</form>
			<form method="post">
				<label for="login">Login : </label>
					<input name="login" type="text" value="<?php echo $_SESSION['login']; ?>"/>&nbsp&nbsp
				<label for="password">Mot de passe : </label>
					<input name="password" type="text" value="<?php echo $_SESSION['password']; ?>"/>
				<input name="change" type="submit" value="modifier"/>
			</form>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	if(isset($_POST['quit'])){
		session_destroy();
		header('location: index.php');
	}
	
	if(isset($_POST['change'])){
		$table = $bdd->prepare('UPDATE utilisateurs SET login = "'.$_POST['login'].'", password = "'.$_POST['password'].'"');
		$table->execute();
		
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['password'] = $_POST['password'];
		
		header('location: profil.php');
	}
?>