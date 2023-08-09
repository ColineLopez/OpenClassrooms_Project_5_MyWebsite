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
      <button type="button" onclick="window.location.href ='contact.php' ;">Me contacter</button>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>