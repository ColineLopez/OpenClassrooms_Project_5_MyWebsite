<?php $title = 'Rédaction Article'; ?>
<?php ob_start(); ?>
<div class="corps2">
	<h1>Rédaction d'un article</h1>
	<form action="index.php?action=addArticle" method="POST">
        <p>
        	<label for="authorID">Auteur* :</label>
      		<select class='contact' name="authorID">
      			<option value='1'>Coline Lopez</option>
      			<option value='0'>Autre</option>
      		</select>
  		</p>
    	<p>
      		<label for="title">Titre* :</label>
      		<input class='contact' name="title" required autocomplete="off">
 		</p>
 		<p>
      		<label for="image">Image :</label>
      		<input class='contact' name="image" autocomplete="off">
 		</p>
 		<p>
      		<label for="chapo">Chapo* :</label>
      		<textarea class='contact' name="chapo" required autocomplete="off"></textarea>
 		</p>
 		<p>
      		<label for="content">Content* :</label>
      		<textarea class='contact' name="content" required autocomplete="off"></textarea>
 		</p>
 		<p>
  			<input type="submit" value="Envoyer">
		</p>
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>