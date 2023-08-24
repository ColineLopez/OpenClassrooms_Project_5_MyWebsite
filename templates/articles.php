<?php $title = "Articles"; ?>
<?php ob_start(); ?>
<?php
if (isset($_SESSION['admin'])) {
?>
<!-- <a href='index.php?action=articleWriting'>Rédiger un article</a> -->
<?php
}
?>
<div id="articles-banniere">
    <section>
        <h1 class='white-shadow'>Les articles<br><hr class='big-white'><br><a class='btn btn-orange' href='index.php?action=articleWriting'>Rédiger un article</a></h1>
    </section>
</div>
<div class="corps corps-white">
	<div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>Tous les articles</h2>
        <hr style='margin-right:50px'>
    </div>
	<?php 
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
			<div class='element vertical-center margin-content'>
				<img class='art-img' src="<?php echo $post->image; ?>">
			</div>
		</div>
		<p class='center'>
			<a class='btn btn-orange' href='index.php?action=article&postID=<?php echo $post->postID; ?>')>Lire plus ></a>
		</p>
	</div>
</div>
	<?php 
		}
	?>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>