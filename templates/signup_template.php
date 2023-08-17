<?php $title = "Inscription"; ?>

<?php ob_start(); ?>


<div class="corps2">

	<h1>Inscription</h1>

    <form action="index.php?action=signUpOperation" method="post">   
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
            <input type="password" name="passwordConfirmation" required autocomplete="off">
        </div>
        <!-- Ajouter une case pour accepter les conditions générales -->
        <div>
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
            <button type="submit">Inscription</button>
        </div>   
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>