<?php $title = $post->title; ?>

<?php ob_start(); ?>

<div class="corps1">
	<div class="news">
		<h1><?= htmlspecialchars($post->title); ?></h1>
		<p>
			<?= htmlspecialchars($post->chapo); ?>
		</p>
		<p> 
			<?= "Le " . htmlspecialchars($post->creationDate) . ", par " . htmlspecialchars($post->author); ?>
		</p>
		<img>
		<p> 
			<?= htmlspecialchars($post->content); ?>
		</p>

	</div>
</div>



<div class="corps2">

	<h3>Ajouter un commentaire</h3>

	<form action="index.php?action=addComment&postID=<?= $post->postID ?>" method="POST">
        <div>
        	<div class="tenpix">Nom*</div>
      		<input class="contact" type="text" name="author" required autocomplete="off">
  		</div>
    	<div>
      		<div class="tenpix"></div>
      		<div class="tenpix">Message*</div>
      		<textarea class="contact" name="comment" required autocomplete="off"></textarea>
 		</div>
 		<div>
  			<button class="center" type="submit">Envoyer</button>
		</div>
	</form>

	<br>
</div>

<div class="corps2">

	<h3>Commentaires</h3>


	<?php 
		foreach ($comments as $comment){
	?>
		<div class="news">
			<p> 
				<?= "Le " . htmlspecialchars($comment->creationDate) . ", par " . htmlspecialchars($comment->author) ?>
			</p>

			<p>
				<?= htmlspecialchars($comment->content) ?>		
			</p>

		</div>

	<?php 
		}
	?>


</div>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>
