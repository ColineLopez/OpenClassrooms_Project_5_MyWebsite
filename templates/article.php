<?php $title = $post->title; ?>
<?php ob_start(); ?>
<div class="corps1">
	<div class="news">
		<h1><?php echo htmlspecialchars($post->title); ?></h1>
		<p>
			<?php echo htmlspecialchars($post->chapo); ?>
		</p>
		<p> 
			<?php echo "Le " . htmlspecialchars($post->creationDate) . ", par " . htmlspecialchars($post->author); ?>
		</p>
		<img>
		<p> 
			<?php echo htmlspecialchars($post->content); ?>
		</p>

	</div>
</div>
<div class="corps2">
	<h3>Ajouter un commentaire</h3>
	<form action="index.php?action=addComment&postID=<?= $post->postID ?>" method="POST">
        <p>
        	<label for="author">Nom* :</label>
      		<input class="contact" type="text" name="author" required autocomplete="off">
  		</p>
    	<p>
      		<label for="comment">Message* :</label>
      		<textarea class="contact" name="comment" required autocomplete="off"></textarea>
 		</p>
 		<p>
  			<input type="submit" value="Envoyer">
		</p>
	</form>
</div>
<div class="corps2">
	<h3>Commentaires</h3>
	<?php 
		foreach ($comments as $comment){
	?>
		<div class="news">
			<p> 
				<?php echo "Le " . htmlspecialchars($comment->creationDate) . ", par " . htmlspecialchars($comment->author); ?>
			</p>
			<p>
				<?php echo htmlspecialchars($comment->content); ?>		
			</p>
		</div>
	<?php 
		}
	?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>