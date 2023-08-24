<?php $title = "Inscription"; ?>
<?php ob_start(); ?>
<div class="corps corps-white">
    <div class="grid">
        <div class="element vertical-center margin-content">     
            <h4 class='uppercase green'>Inscription</h4>
            <hr class='short'>
            <p class='green'><b>Vous avez des articles à rédiger ?</b></p>
            <p>En vous inscrivant, vous pourrez vous aussi être rédacteur !</p>        
        </div>
        <div class="element vertical-center margin-content">
            <form action="index.php?action=signUpOperation" method="post">   
                <div class="grid">
                <div class="element"><input class="nom_prenom corps-yellow" type="text" name="lastname" placeholder="Nom" required autocomplete="off"></div>
                <div class="element"><input class="nom_prenom corps-yellow" type="text" name="firstname" placeholder="Prénom" required autocomplete="off"></div>
                </div>
                <p>
                    <input type="email" name="email" class="corps-yellow contact" placeholder="Email" required autocomplete="off">
                </p>
                <p>
                    <input type="password" name="password" class="corps-yellow contact" placeholder="Mot de passe" required autocomplete="off">
                </p>
                <p>
                    <input type="password" class="corps-yellow contact" placeholder="Confirmation du mot de passe" name="passwordConfirmation" required autocomplete="off">
                </p>
                <!-- Ajouter une case pour accepter les conditions générales -->
                <p>
                    <?php 
                        if(isset($_GET['err']))
                            {
                                $err = htmlspecialchars($_GET['err']);
                                $message = match($err) {
                                    'wrong' => "<strong>Erreur</strong>, les données du formulaire sont invalides.",
                                    'success' => "<strong>Succès</strong>, inscription réussie ! <a href='index.php?action=signin'>Cliquez ici</a>  pour vous connecter.",
                                    'password' => "<strong>Erreur</strong>, le mot de passe est différent",
                                    'already' => "<strong>Erreur</strong>, un compte existe déjà à cette adresse",
                                    'error' => "<strong>Erreur</strong>, impossible de vous inscrire",
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