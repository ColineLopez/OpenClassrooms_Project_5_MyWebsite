<!DOCTYPE html>

<html lang='fr'>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
		<link href="../style/style.css" rel="stylesheet" />
        
	</head>

	<?php include_once('header.php') ?>

	<body>

		<h1>Inscription</h1>
		
		<div class="corps2">

			<form action="../src/signup_config.php" method="post">   
				<div class="grid">
	            <div class="element">Nom*</div>
	            <div class="element">Prénom*</div>
	          </div>
	          <div class="grid">
	            <div class="element"><input class="nom_prenom" type="text" name="lastname" required autocomplete="off"></div>
	            <div class="element"><input class="nom_prenom" type="text" name="firstname" required autocomplete="off"></div>
	            </div>
	            <div class="tenpix">
	            	<div>Email*</div>
	                <input type="email" name="email" required autocomplete="off">
	            </div>
	            <div class="tenpix">
	            	<div>Mot de passe*</div>
	                <input type="password" name="password" required autocomplete="off">
	            </div>
	            <div class="tenpix">
	            	<div>Confirmez votre mot de passe*</div>
	                <input type="password" name="password_retype" required autocomplete="off">
	            </div>
	            <!-- Ajouter une case pour accepter les conditions générales -->
	            <div>
	            	<?php
					if(isset($_GET['reg_err']))
					{
						$err = htmlspecialchars($_GET['reg_err']);

						switch($err) 
						{
							case 'success':
							?>
							<div class="alert alert-success">
								<strong>Succès</strong> inscription réussie ! <br>
								<a href='index.php'>Retour à la page d'Accueil</a>
							</div>
							<?php
							break;

							case 'password':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> mot de passe différent
							</div>
							<?php
							break;
							
							case 'email':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> email non valide
							</div>
							<?php
							break;

							case 'email_length':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> email trop long
							</div>
							<?php
							break;

							case 'pseudo_length':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> pseudo trop long
							</div>
							<?php
							break;

							case 'already':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> compte déjà existant
							</div>
							<?php
							break;
						}
					}
				?>
	                <button type="submit">Inscription</button>
	            </div>   
	        </form>
	    </div>

	</body>

</html>