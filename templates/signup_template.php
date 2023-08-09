<?php $title = "Inscription"; ?>

<?php ob_start(); ?>


<div class="corps2">

	<h1>Inscription</h1>

	<form action="../src/signup_config.php" method="post">   
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
            <input type="password" name="password_retype" required autocomplete="off">
        </div>
        <!-- Ajouter une case pour accepter les conditions générales -->
        <div>
        	<?php 
                if(isset($_GET['reg_err']))
                    {
                        $err = htmlspecialchars($_GET['reg_err']);
                        $message = match($err) {
                        'success' => "<strong>Succès</strong>, inscription réussie ! <a href='index.php'>Retour à la page d'Accueil</a>",
                        'password' => "<strong>Erreur</strong>, le mot de passe est différent",
                        'email' => "<strong>Erreur</strong>, l'email n'est pas valide",
                        'email_length' => "<strong>Erreur</strong>, l'email est trop long",
                        'firstname_length' => "<strong>Erreur</strong>, votre prénom est trop long",
                        'lastname_length' => "<strong>Erreur</strong>, votre nom est trop long",
                        'already' => "<strong>Erreur</strong>, un compte existe déjà à cette adresse",
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