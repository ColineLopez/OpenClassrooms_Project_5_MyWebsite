<!DOCTYPE html>

<html lang='fr'>
	<head>
		<meta charset="utf-8">
        <title>Connexion</title>
        <link href="../style/style.css" rel="stylesheet" />
	</head>

	<?php include_once('header.php') ?>

	<body>

		<h1>Connexion</h1>

		<div class="corps2">
		
            <form action="../src/signin_config.php" method="post"> 
            	<div class="tenpix">
	            	<div>Email*</div>
	                <input type="email" name="email" required autocomplete="off">
	            </div>
	            <div class="tenpix">
	            	<div>Mot de passe*</div>
	                <input type="password" name="password" required autocomplete="off">
	            </div>

                <div>
                		<?php
				if(isset($_GET['login_err']))
				{
					$err = htmlspecialchars($_GET['login_err']);

					switch($err) 
					{
						case 'password':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> mot de passe incorrect
						</div>
						<?php
						break;
						
						case 'email':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> email incorrect
						</div>
						<?php
						break;

						case 'already':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> compte non existant
						</div>
						<?php
						break;
					}
				}
			?>


                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>

        <p class="text-center"><a href="../signup.php">Je n'ai pas de compte, m'inscrire</a></p>
        </div>


	</body>

</html>