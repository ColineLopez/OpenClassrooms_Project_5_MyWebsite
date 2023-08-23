<?php $title = 'Modification Article : ' . $post->title; ?>
<?php ob_start(); ?>
<div class="corps2">
	<h1>Modification d'un article</h1>
	<form action="index.php?action=editArticleOperation&postID=<?php echo $post->postID ;?>" method="POST">
        <p>
        	<label for="authorID">Auteur* :</label>
      		<select class='contact' name="authorID">
      			<option value='1'>Coline Lopez</option>
      			<option value='0'>Autre</option>
      		</select>
  		</p>
    	<p>
      		<label for="title">Titre* :</label>
      		<input class='contact' name="title" required value="<?php echo htmlspecialchars($post->title); ?>">
 		</p>
 		<p>
      		<label for="chapo">Chapo* :</label>
      		<textarea class='contact' name="chapo" required><?php echo htmlspecialchars($post->chapo); ?></textarea>
 		</p>
 		<p>
      		<label for="content">Content* :</label>
      		<textarea class='contact' name="content" required ><?php echo htmlspecialchars($post->content); ?></textarea>
 		</p>
 		<p>
  			<input type="submit" value="Envoyer">
		</p>
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>