<!DOCTYPE html>
<html lang='fr'>

<head>
	<meta charset="utf-8" /> 
	<title>Articles</title>
	<link rel="icon" type="image/png" href="../images/logo.png" />
	<link href="../style/style.css" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>

<?php include_once(__DIR__.'/../header.php'); ?>

<body>

	<div class="corps2">

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
			</p>
			<button onclick="window.location.href='article.php?postID=<?= $post['articleID']; ?>'")>Lire plus ></button>

		</div>

		<?php 
			}
		?>

	</div>

</body>

<?php include_once(__DIR__.'/../footer.php'); ?>

</html>
