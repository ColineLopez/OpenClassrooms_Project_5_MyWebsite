<!DOCTYPE html>

<html lang='fr'>
	<head>
		<meta charset="utf-8" /> 
		<title>Article</title>
		<link href="../style/style.css" rel="stylesheet" />
	</head>

	<?php include_once('header.php') ?>

	<body>

		<h1>Articles</h1>

		<?php 
		foreach ($posts as $post){
		?>
			<div class="corps1">
			<div class="news">
				<h1><?= htmlspecialchars($post['title']); ?></h1>
				<p>
					<?= htmlspecialchars($post['chapo']); ?>
				</p>
				<p> 
					<?= "Le " . htmlspecialchars($post['creationDate']) . ", par " . htmlspecialchars($post['authorID']); ?>
				</p>
				<img>
				<p> 
					<?= htmlspecialchars($post['content']); ?>
				</p>

			</div>
		</div>

		<?php 
		}
		?>
	</body>
</html>
