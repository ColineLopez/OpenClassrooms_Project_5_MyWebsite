<!DOCTYPE html>
<html lang='fr'>

<head>
	<meta charset="utf-8" /> 
	<title><?= $title ?></title>
	<link rel="icon" type="image/png" href="../images/logo.png" />
	<link href="../style/style.css" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>

<?php include_once(__DIR__.'/../header.php'); ?>

<body>
 	<?= $content ?>
</body>


<?php include_once(__DIR__.'/../footer.php'); ?>

</html>