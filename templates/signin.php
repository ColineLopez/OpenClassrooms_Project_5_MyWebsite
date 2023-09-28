<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<div class="corps news">
    <div class="grid">
        <div class="element vertical-center margin-content">     
            <h4 class='uppercase green'>Connexion</h4>
            <hr class='short'>
            <p class='green'><b>Vous ne possédez pas encore de compte ?</b></p>
            <p>En cliquant sur le lien ci-dessous, vous serez redirigés directement sur la page d'inscription.</p>
            <br>
            <a class="green bold underline" href="index.php?action=signup">Je n'ai pas de compte, je souhaite m'inscrire !</a>          
        </div>
        <div class="element vertical-center margin-content">

            <form action="index.php?action=signInOperation" method="POST"> 
                <p>
                    <input type="email" name="email" class="contact corps-yellow" placeholder="Email" required autocomplete="off">
                </p>
                <p>
                    <input type="password" class="contact corps-yellow" placeholder="Mot de passe" name="password" required autocomplete="off">
                </p>
                <p>
                <?php 
                    if(isset($_GET['err']))
                        {
                            $err = htmlspecialchars($_GET['err']);
                            $message = match($err) {
                                'wrong' => "<p class='orange'><strong>Erreur</strong>, les données du formulaire sont invalides.</p>",
                                'password' => "<p class='orange'><strong>Erreur</strong>, le mot de passe est incorrect.</p>",
                                'unknown' => "<p class='orange'><strong>Erreur</strong>, aucun compte n'est inscrit avec cet email.</p>",
                                'error' => "<p class='orange'><strong>Erreur</strong>, impossible de vous connecter.</p>",
                        };
                         echo $message;
                    }; 
                ?>
                </p>
                <p>
                  <input type="submit" class="submit btn-green white-shadow bold" value="Connexion">
                </p> 
            </form>
        </div>
    </div>   
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>
