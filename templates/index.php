<?php $title = "Coline Lopez - Développeuse"; ?>
<?php ob_start(); ?>
<div id="banniere">
    <section>
        <h1>Développeuse PHP / Symfony - Création de sites web</h1>
    </section>
</div>
<div class="corps1">
    <h2>Coline Lopez</h2>
    <p>Phrase d'accroche.</p>
    <div>
      <button type="button" onclick="window.location.href ='index.php?#contact' ;">Me contacter</button>
    </div>
</div>
<div class="corps2">
    <h2>Me contacter</h2>
    <form id="contact" action="index.php?action=contactPost" method="POST">
        <p>
          <div class="grid">
            <div class="element">Nom* :</div>
            <div class="element">Prénom* :</div>
          </div>
          <div class="grid">
            <div class="element"><input class="nom_prenom" type="text" name="lastname" required autocomplete="off"></div>
            <div class="element"><input class="nom_prenom" type="text" name="firstname" required autocomplete="off"></div>
          </div>
        </p>
        <p>
          <label for="email">Email* :</label>
          <input class="contact" type="email" name="email" required>
        </p>
        <p>
          <label for="content">Message* :</label>
          <textarea class="contact" name="content" required autocomplete="off"></textarea>
        </p>
        <p>
            <?php 
                if(isset($_GET['err']))
                    {
                        $err = htmlspecialchars($_GET['err']);
                        $message = match($err) {
                        'success' => "<strong>Merci</strong>, votre demande de contact a bien été envoyée !",
                        'wrong' => "<strong>Erreur</strong>, les données du formulaire sont invalides.",
                        'error' => "<strong>Erreur</strong>, nous ne pouvons pas soumettre votre demande de contact.",
                    };
                    echo $message;
                }; 
            ?>
        </p>
        <p>
          <input type="submit" value="Envoyer">
        </p>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>