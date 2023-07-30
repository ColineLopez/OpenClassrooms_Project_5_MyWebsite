<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" /> 
		<title>Articles</title>
		<link href="../style/style.css" rel="stylesheet" />
	</head>

	<?php include_once('header.php') ?>

	<body>

		<h1>Articles</h1>

		<?php 
		foreach ($posts as $post){
		?>
			<div class="news">
				<p> 
					<?= "Le " . htmlspecialchars($post['creationDate']) . ", par " . htmlspecialchars($post['authorID']); ?>
				</p>
				<h3> 
					<?= htmlspecialchars($post['title'] . " le " . $post['creationDate']); ?>
				</h3>

				<p>
					<?= htmlspecialchars($post['chapo']); ?>
					<br>
					<button>Lire plus ></button>
				</p>

			</div>

		<?php 
		}
		?>
	</body>
</html>
