<?php $title = "Contact"; ?>

<?php ob_start(); ?>

<div class="corps2">

    <h2>Me contacter</h2>

    <!-- <form id="contact" action="src/submit_contact.php" method="POST"> -->
    <form id="contact" action="" method="POST">
        <div>
          <div class="grid">
            <div class="element">Nom*</div>
            <div class="element">Prénom*</div>
          </div>
          <div class="grid">
            <div class="element"><input class="nom_prenom" type="text" name="lastname" required autocomplete="off"></div>
            <div class="element"><input class="nom_prenom" type="text" name="firstname" required autocomplete="off"></div>
          </div>
        </div>
        <div>
          <div class="tenpix">Email*</div>
          <input class="contact" type="email" name="email" required>
        </div>
        <div>
          <div class="tenpix"></div>
          <div class="tenpix">Message*</div>
          <textarea class="contact" name="message" required autocomplete="off"></textarea>
        </div>
        <div>
            <?php 
                if(isset($_GET['reg_err']))
                    {
                        $err = htmlspecialchars($_GET['reg_err']);
                        $message = match($err) {
                        'success' => "<strong>Merci</strong>, votre message a bien été envoyé",
                        'email' => "<strong>Erreur</strong>, l'email n'est pas valide",
                        'email_length' => "<strong>Erreur</strong>, l'email est trop long",
                        'firstname_length' => "<strong>Erreur</strong>, votre prénom est trop long",
                        'lastname_length' => "<strong>Erreur</strong>, votre nom est trop long",
                    };
                     echo $message;
                }; 
            ?>
        </div>
        <div>
          <button class="center" type="submit">Envoyer</button>
        </div>
    </form>

    <?php 

if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email'])  && isset($_POST['message'])){

    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    contactRequest($lastname, $firstname, $email, $message);
}

?>


</div>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>
