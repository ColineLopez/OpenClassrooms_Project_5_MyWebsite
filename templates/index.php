<?php $title = "Coline Lopez - Développeuse"; ?>
<?php ob_start(); ?>
<div id="index-banniere">
    <section>
        <h1 class='white-shadow'>Développeuse PHP / Symfony - Création de sites web<br><br><a class='btn btn-orange' href='index.php#apropos'>En savoir plus</a></h1>
    </section>
</div>
<div class='corps corps-white'>
    <div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>À propos</h2>
        <hr style='margin-right:50px'>
    </div>
    <div class="grid">
        <div class="element picture">
        </div>
        <div class="element vertical-center margin-content">     
            <h4 class='uppercase green'>Présentation</h4>
            <hr class='short'>
            <p>Bonjour, je suis Coline Lopez, une développeuse web passionnée !</p>
            <p>Transformez vos idées en réalité numérique, alliant créativité et expertise technique pour créer des expériences en ligne uniques et fonctionnelles !</p>
            <br>
            <p><a href="index.php?#contact" class='btn btn-green white-shadow'>Me contacter</a></p>
        </div>
    </div>
</div>
<div class='corps corps-yellow'>
    <div class="grid-grow">
        <div class='item'><p class='white-shadow'>Vous souhaitez en savoir plus sur moi ? N'hésitez pas à jeter un coup d'oeil sur mon parcours !</p></div>
        <div class='item'><p><a href='' class='btn btn-orange white-shadow'>Voir mon CV</a></p></div>
    </div>
</div>
<div class="corps corps-white">
    <div class="grid">
        <div class="element vertical-center margin-content">     
            <h4 class='uppercase green'>Contact</h4>
            <hr class='short'>
            <p class='green'><b>Vous avez un projet, une idée ? Besoin d'un partenaire ?</b></p>
            <p>En remplissant notre formulaire, c'est déjà un premier pas en direction de la conception parfaite de votre site internet !</p>
            <hr>
            <p class='small'>coline.llopez@gmail.com</p>
            <p class='small'>+33 6 59 07 78 49</p>            
        </div>
        <div class="element vertical-center margin-content">
            <form id="contact" action="index.php?action=contactPost" method="POST">
                  <div class="grid">
                    <div class="element"><input class="nom_prenom corps-yellow" type="text" name="lastname" placeholder="Nom" required autocomplete="off"></div>
                    <div class="element"><input class="nom_prenom corps-yellow" type="text" name="firstname" placeholder="Prénom" required autocomplete="off"></div>
                  </div>
                <div>
                  <input class="contact corps-yellow" type="email" name="email" placeholder="Email" required>
                </div>
                <div>
                  <textarea class="contact corps-yellow" name="content" placeholder="Message" required autocomplete="off"></textarea>
                </div>
                <div>
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
                </div>
                <div>
                  <input class="submit btn-green white-shadow bold" type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>   
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>