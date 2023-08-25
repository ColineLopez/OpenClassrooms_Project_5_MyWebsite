<?php $title = 'Modification Article : ' . $post->title; ?>
<?php ob_start(); ?>
<div class="corps news">
	<div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>Modification d'un article</h2>
        <hr style='margin-right:50px'>
    </div>
    <div class="grid">
    	<div class="element vertical-center margin-content">
    		<h4 class='uppercase green'>Modifiez votre article !</h4>
            <hr class='short'>
            <p class='green'><b>Vous souhaitez apporter des modifications à l'article "<?php echo htmlspecialchars($post->title); ?>", écrit par <?php echo htmlspecialchars($post->author); ?> ?</b></p>
            <p>Il vous suffit d'écrire les modifications dans le formulaire, et nous nous efforcerons de les valider au plus vite !</p> 
    	</div>
    	<div class="element vertical-center margin-content">
			<form action="index.php?action=editArticleOperation&postID=<?php echo $post->postID ;?>" method="POST">
		        <p>
		        	<label for="email" class="green bold">Email de l'auteur</label>
		      		<input type="email" class='contact corps-yellow' name="email" required autocomplete="off" value="<?php echo $_SESSION['user_email']; ?>" <?php if(!$_SESSION['user_admin']) {?>readonly<?php } ?>>
		  		</p>
		    	<p>
		      		<label for="title" class="green bold">Titre</label>
		      		<input class='contact corps-yellow' name="title" required value="<?php echo htmlspecialchars($post->title); ?>">
		 		</p>
		 		<p>
		      		<label for="chapo" class="green bold">Chapo</label>
		      		<textarea class='contact corps-yellow' name="chapo" required><?php echo htmlspecialchars($post->chapo); ?></textarea>
		 		</p>
		 		<p>
		      		<label for="content" class="green bold">Contenu</label>
		      		<textarea class='contact corps-yellow' name="content" required ><?php echo htmlspecialchars($post->content); ?></textarea>
		 		</p>
		 		<p>
		  			<input type="submit" class="submit btn-green white-shadow bold" value="Envoyer">
				</p>
			</form>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>