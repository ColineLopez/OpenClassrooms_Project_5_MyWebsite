<?php $title = $post->title; ?>
<?php ob_start(); ?>
<div class='article-banniere' style='background: url(<?php echo $post->image;?>);background-size: cover;background-position: center;'>
	<section>
        <h1 class='white-shadow'>
        	<?php echo htmlspecialchars($post->title); ?>
        	<hr class='big-white'>
	        <?php
			if (isset($_SESSION['user']) && $_SESSION['user_admin']) {
			?>
			<a class='btn btn-orange' href='index.php?action=articleEdition&postID=<?php echo htmlspecialchars($post->postID); ?>'>Modifier cet article</a> 
			<a class='btn btn-orange' href='index.php?action=articleDeletion&postID=<?php echo htmlspecialchars($post->postID); ?>'>Supprimer cet article</a>
			<?php
			} elseif (isset($_SESSION['user']) && $_SESSION['user_email'] == $post->email) { ?>
				<a class='btn btn-orange' href='index.php?action=articleEdition&postID=<?php echo htmlspecialchars($post->postID); ?>'>Modifier cet article</a> 
			<?php
			}
			?>
        </h1>
    </section>
</div>	
<div class="corps corps-white margin-content">
	<h4 class='uppercase green'>
	<?php 
	echo htmlspecialchars($post->title); 
	?>
	</h4>
    <hr class='short'>
    <p>
		<?php echo htmlspecialchars($post->chapo); ?>
	</p>
	<br>
	<p> 
		<?php echo htmlspecialchars($post->content); ?>
	</p>
	<p class="bold"> 
		<?php echo "Le " . htmlspecialchars($post->creationDate) . ", par " . htmlspecialchars($post->author); ?>
	</p>
</div>
<div class="corps corps-white">
	<div class='grid-three'>
		<hr style='margin-left:50px'>
    	<h2 class='lined green'>Ajouter un commentaire</h2>
    	<hr style='margin-right:50px'>
	</div>
	<?php 
        if(isset($_GET['err']))
            {
                $err = htmlspecialchars($_GET['err']);
                $message = match($err) {
                'comm' => "<strong>Merci</strong>, votre commentaire a bien été transmis à notre équipe de modération.",
            };
            echo $message;
        }; 
    ?>
	<div class=news>
		<form action="index.php?action=addComment&postID=<?php echo htmlspecialchars($post->postID); ?>" method="POST">
	        <p>
	      		<input class="contact gray-border" type="text" name="author" placeholder="Nom" required autocomplete="off">
	  		</p>
	    	<p>
	      		<textarea class="contact gray-border" name="comment" placeholder="Message" required autocomplete="off"></textarea>
	 		</p>
	 		<p>
	  			<input class="submit btn-green white-shadow bold" type="submit" value="Envoyer">
			</p>
		</form>
	</div>
</div>
<div class="corps corps-white margin-content">
	<div class='grid-three'>
		<hr style='margin-left:50px'>
    	<h2 class='lined green'>Commentaires</h2>
    	<hr style='margin-right:50px'>
	</div>
		<?php 
			foreach ($comments as $comment){
				if($comment->status==2){
		?>
				<h4 class='uppercase green'>
				<?php 
				echo htmlspecialchars($comment->author); 
				?>
				</h4>
			    <hr class='short'>
			    <p>
					<?php echo htmlspecialchars($comment->content); ?>		
				</p>
				<p class='align-right bold'> 
					<?php echo "Le " . htmlspecialchars($comment->creationDate); ?>
				</p>
				<hr class="small-gray">
				<br>
			<?php
				} 
			}
		?>
	<br>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>