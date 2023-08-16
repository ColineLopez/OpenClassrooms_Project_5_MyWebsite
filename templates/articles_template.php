<?php $title = "Articles"; ?>

<?php ob_start(); ?>


<div class="corps2">

	<h1>Articles</h1>

	<?php 
		foreach ($posts as $post){
	?>
	<div class="news">
		<p> 
			<?= "Le " . htmlspecialchars($post->creationDate) . ", par " . htmlspecialchars($post->author); ?>
		</p>
		<h3> 
			<?= htmlspecialchars($post->title . " le " . $post->creationDate); ?>
		</h3>

		<p>
			<?= htmlspecialchars($post->chapo); ?>
		</p>
		<button onclick="window.location.href='index.php?action=article&postID=<?= urlencode($post->postID); ?>'")>Lire plus ></button>

	</div>

	<?php 
		}
	?>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>