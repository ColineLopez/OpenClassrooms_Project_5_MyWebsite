<?php $title = "Articles"; ?>
<?php ob_start(); ?>
<div id="articles-banniere">
    <section>
        <h1 class='white-shadow'>
        	Les articles
        	<br>
        	<hr class='big-white'>
        	<br>
        	<?php
        	if (isset($_SESSION['user'])) {
        		echo "<a class='btn btn-orange' href='index.php?action=articleWriting'>Rédiger un article</a>";
        	}
        	?>	
        </h1>
    </section>
</div>
<div class="corps corps-white">
	<div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>Tous les articles</h2>
        <hr style='margin-right:50px'>
    </div>
    <?php 
        if(isset($_GET['err']))
            {
                $err = htmlspecialchars($_GET['err']);
                $message = match($err) {
                'add' => "<p class='green margin-content'><strong>Merci</strong>, votre article a bien été ajouté!</p>",
                'modif' => "<p class='green margin-content'><strong>Merci</strong>, l'article a bien été modifié !</p>",
            };
            echo $message;
        }; 
		foreach ($posts as $post){
	?>
	<div class="news">
		<div class="grid">
			<div class="element margin-content">
				<h4 class='uppercase green'>
					<?php 
					echo htmlspecialchars($post->title); 
					?>
				</h4>
	            <hr class='short'>
	            <p>
	            	<?php 
	            	echo htmlspecialchars($post->chapo); 
	            	?>
	            </p>
				<p class='bold'> 
					<?php 
					echo "Le " . htmlspecialchars($post->creationDate) . ", par " . htmlspecialchars($post->author); 
					?>
				</p>
			</div>
			<div class='element vertical-center margin-content art-img media' style='background: url(<?php echo $post->image;?>);background-size: cover;background-position: center;'>
			</div>
		</div>
		<p class='center gridmedia'>
			<a class='btn btn-orange' href='index.php?action=article&postID=<?php echo $post->postID; ?>')>Lire plus ></a>
			<?php
			if ((isset($_SESSION['user']) && $_SESSION['user_email'] == $post->email) || (isset($_SESSION['user']) && $_SESSION['user_admin'])) { ?>
				<a class='btn btn-orange' href='index.php?action=articleEdition&postID=<?php echo htmlspecialchars($post->postID); ?>'>Modifier cet article</a> 
			<?php 
			} 
			if (isset($_SESSION['user']) && $_SESSION['user_admin']) { ?>
				<a class='btn btn-orange' href='index.php?action=articleDeletion&postID=<?php echo htmlspecialchars($post->postID); ?>'>Supprimer cet article</a>
			<?php
			}
			?>
		</p>
		<br>
	</div>
</div>
	<?php 
		}
	?>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>