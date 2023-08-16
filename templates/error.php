<?php $title = "Coline Lopez - Développeuse"; ?>

<?php ob_start(); ?>
<h1>Coline Lopez - Développeuse</h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>