<?php $title = "Inscription"; ?>
<?php ob_start(); ?>
<div class="corps2">
	<h1>Inscription</h1>
    <form action="index.php?action=signUpOperation" method="post">   
		<div class="grid">
        <div class="element">Nom* :</div>
        <div class="element">Prénom* :</div>
      </div>
      <div class="grid">
        <div class="element"><input class="nom_prenom" type="text" name="lastname" required autocomplete="off"></div>
        <div class="element"><input class="nom_prenom" type="text" name="firstname" required autocomplete="off"></div>
        </div>
        <p>
        	<label for='email'>Email* :</label>
            <input type="email" name="email" required autocomplete="off">
        </p>
        <p>
        	<label for="password">Mot de passe* :</label>
            <input type="password" name="password" required autocomplete="off">
        </p>
        <p>
        	<label for="passwordConfirmation">Confirmez votre mot de passe* :</label>
            <input type="password" name="passwordConfirmation" required autocomplete="off">
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
            <input type="submit" value="Inscription">
        </p>   
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>