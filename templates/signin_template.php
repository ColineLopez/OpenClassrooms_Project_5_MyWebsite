<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<div class="corps2">

	<h1>Connexion</h1>

    <form action="index.php?action=signInOperation" method="POST"> 
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
            <button type="submit">Connexion</button>
        </div>   
    </form>

    <p class="text-center">
    	<a href="index.php?action=signup">Je n'ai pas de compte, m'inscrire</a>
    </p>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>