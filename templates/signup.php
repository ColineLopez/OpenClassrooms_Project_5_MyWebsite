<?php $title = "Inscription"; ?>
<?php ob_start(); ?>
<div class="corps news">
    <div class="grid">
        <div class="element vertical-center margin-content">     
            <h4 class='uppercase green'>Inscription</h4>
            <hr class='short'>
            <p class='green'><b>Vous avez des articles à rédiger ?</b></p>
            <p>En vous inscrivant, vous pourrez vous aussi être rédacteur !</p>        
        </div>
        <div class="element vertical-center margin-content">
            <form action="index.php?action=signUpOperation" method="post"> 
                <p> 
                    <input class="contact corps-yellow" type="text" name="name" placeholder="Nom" required autocomplete="off">
                </p>
                <p>
                    <input type="email" name="email" class="corps-yellow contact" placeholder="Email" required autocomplete="off">
                </p>
                <p>
                    <input type="password" name="password" class="corps-yellow contact" placeholder="Mot de passe" required autocomplete="off">
                </p>
                <p>
                    <input type="password" class="corps-yellow contact" placeholder="Confirmation du mot de passe" name="passwordConfirmation" required autocomplete="off">
                </p>
                <p>
                    <input class="corps-yellow contact" type="checkbox" name="formTermes" value="Yes" required>J'accepte les <a class="green" href="index.php?action=cgu">conditions générales d'utilisations</a>.
                </p>
                <p>
                    <?php 
                        if(isset($_GET['err']))
                            {
                                $err = htmlspecialchars($_GET['err']);
                                $message = match($err) {
                                    'wrong' => "<p class='orange'><strong>Erreur</strong>, les données du formulaire sont invalides.</p>",
                                    'success' => "<p class='green'><strong>Succès</strong>, inscription réussie ! <a href='index.php?action=signin'>Cliquez ici</a>  pour vous connecter.</p>",
                                    'password' => "<p class='orange'><strong>Erreur</strong>, le mot de passe est différent.</p>",
                                    'already' => "<p class='orange'><strong>Erreur</strong>, un compte existe déjà à cette adresse.</p>",
                                    'error' => "<p class='orange'><strong>Erreur</strong>, impossible de vous inscrire.</p>",
                            };
                             echo $message;
                        }; 
                    ?>
                </p>
                <p>
                    <input type="submit" class="submit btn-green white-shadow bold" value="Inscription">
                </p>   
            </form>
        </div>
    </div>   
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>
