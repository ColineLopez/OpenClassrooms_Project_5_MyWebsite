<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<div class="corps2">
	<h1>Connexion</h1>
    <form action="index.php?action=signInOperation" method="POST"> 
    	<p>
        	<label for="email">Email* :</label>
            <input type="email" name="email" required autocomplete="off">
        </p>
        <p>
        	<label for='password'>Mot de passe* :</label>
            <input type="password" name="password" required autocomplete="off">
        </p>
        <p>
        <?php 
            if(isset($_GET['err']))
                {
                    $err = htmlspecialchars($_GET['err']);
                    $message = match($err) {
                        'wrong' => "<strong>Erreur</strong>, les données du formulaire sont invalides.",
                        'password' => "<strong>Erreur</strong>, le mot de passe est incorrect",
                        'unknown' => "<strong>Erreur</strong>, aucun compte n'est inscrit avec cet email",
                        'error' => "<strong>Erreur</strong>, impossible de vous connecter",
                };
                 echo $message;
            }; 
        ?>
        </p>
        <p>
          <input type="submit" value="Connexion">
        </p> 
    </form>
    <p class="text-center">
    	<a href="index.php?action=signup">Je n'ai pas de compte, m'inscrire</a>
    </p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>