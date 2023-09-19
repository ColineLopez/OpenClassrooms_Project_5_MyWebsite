<?php $title = 'Suppression Article : ' . $post->title; ?>
<?php ob_start(); ?>
<div class="corps news">
	<div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>Suppression d'un article</h2>
        <hr style='margin-right:50px'>
    </div>
    <div class="center margin-content">
        <p class='green'><b>Souhaitez vous vraiemnt supprimer l'article "<?php echo htmlspecialchars($post->title); ?>", écrit par <?php echo htmlspecialchars($post->author); ?> ?</b></p>
        <br>
        <p>Attention, si vous cliquez sur oui, cette action est irréversible.</p> 
		<br><br>
		<div class='grid'>
			<div class='element gridmedia'>
				<a class='btn btn-orange' href="index.php?action=deleteArticle&postID=<?php echo htmlspecialchars($post->postID); ?>">Oui, supprimer cet article</a>
			</div>
			<div class='element gridmedia'>
				<a class='btn btn-orange' href="index.php?action=articles">Non, retourner à la page des articles</a>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>