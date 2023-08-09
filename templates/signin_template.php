<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


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



<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>