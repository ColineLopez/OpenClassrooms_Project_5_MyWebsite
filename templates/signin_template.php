<!DOCTYPE html>
<html lang='fr'>

<head>
	<meta charset="utf-8" /> 
	<title>Connexion</title>
	<link rel="icon" type="image/png" href="../images/logo.png" />
	<link href="../style/style.css" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>

<?php include_once(__DIR__.'/../header.php'); ?>

<body>

	<div class="corps2">

		<h1>Connexion</h1>
	
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
                if(isset($_GET['reg_err']))
                    {
                        $err = htmlspecialchars($_GET['reg_err']);
                        $message = match($err) {
                        'password' => "<strong>Erreur</strong>, le mot de passe est incorrect",
                        'email' => "<strong>Erreur</strong>, l'email n'est pas valide",
                        'already' => "<strong>Erreur</strong>, aucun compte n'est inscrit avec cet email",
                    };
                     echo $message;
                }; 
            ?>
                <button type="submit">Connexion</button>
            </div>   
        </form>

	    <p class="text-center">
	    	<a href="signup.php">Je n'ai pas de compte, m'inscrire</a>
	    </p>

    </div>


</body>
</html>