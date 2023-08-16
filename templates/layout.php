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

<nav>
  <ul>
    <li id="logo"><a href="index.php"><img class="header-logosize" src="images/logo.png" alt="logo"></a></li>
    <li><a href="index.php">Accueil</a></li>
    <li><a href="index.php?action=articles">Articles</a></li>
    <li><a href="index.php#contact">Contact</a></li>
    <li><a href="index.php?action=signin">Se connecter</a></li>
    <li><button class="mail" onclick="window.open('mailto:coline.llopez@gmail.com','_blank')"></button></li>
    <li><button class='github' onclick="window.open('https://github.com/ColineLopez', '_blank')"></button></li>
    <li><button class='linkedin' onclick="window.open('https://www.linkedin.com/in/coline-lopez-5250a7110/', '_blank')"></button></li>
  </ul>
</nav>

<body>
 	<?= $content ?>
</body>


<footer>
  <ul>
    <li><a href="index.php?action=terms">Mentions Légales</a></li>
    <li><a href="index.php?action=admin">Administration</a></li>
  </ul>
  <div class="footer-container">
    © Copyright - Coline Lopez 2023
  </div>

</footer>

</html>