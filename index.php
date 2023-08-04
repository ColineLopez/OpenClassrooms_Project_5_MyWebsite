<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Coline Lopez - Développeuse</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>


<?php include_once('header.php') ?>

<body>
  <div id="banniere">
    <section>
    <h1>Développeuse PHP / Symfony - Création de sites web</h1></section>
  </div>

  <div class="corps1">

    <h2>Coline Lopez</h2>

    <p>Phrase d'accroche.</p>
    <div>
      <button type="button" onclick="window.location.href ='contact.php' ;">Me contacter</button>
    </div>
  </div>


  <div class="corps2">

    <h2>Me contacter</h2>

    <form id="contact" action="" method="">
        <div>
          <div class="grid">
            <div class="element">Nom*</div>
            <div class="element">Prénom*</div>
          </div>
          <div class="grid">
            <div class="element"><input class="nom_prenom" type="text" name="lastname" required autocomplete="off"></div>
            <div class="element"><input class="nom_prenom" type="text" name="firstname" required autocomplete="off"></div>
          </div>
        </div>
        <div>
          <div class="tenpix">Email*</div>
          <input class="contact" type="email" name="email" required>
        </div>
        <div>
          <div class="tenpix"></div>
          <div class="tenpix">Message*</div>
          <textarea class="contact" name="message" required autocomplete="off"></textarea>
        </div>
        <div>
          <button class="center" type="submit">Envoyer</button>
        </div>
    </form>

  </div>



</body>

<?php include_once('footer.php') ?>

