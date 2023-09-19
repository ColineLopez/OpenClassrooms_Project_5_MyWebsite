<?php $title = "Erreur 404"; ?>
<?php ob_start(); ?>
<div id="index-banniere">
    <section>
        <h1 class='white-shadow'>Erreur 404 : La page que vous recherchez n'existe pas<br><br><a class='btn btn-orange gridmedia' href='index.php'>Retourner à la page d'accueil</a></h1>
    </section>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>