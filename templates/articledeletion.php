<?php $title = 'Suppression Article : ' . $post->title; ?>
<?php ob_start(); ?>
<div class="corps2">
	<h1>Suppression d'un article</h1>
	<p>Voulez-vous vraiment supprimer l'article "<?php echo htmlspecialchars($post->title); ?>" ?</p>
	<a href="index.php?action=deleteArticle&postID=<?php echo htmlspecialchars($post->postID); ?>">Oui, supprimer cet article</a>
	<a href="index.php?action=articles">Non, retourner à la page des articles</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>