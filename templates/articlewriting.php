<?php $title = 'Rédaction Article'; ?>
<?php ob_start(); ?>
<div class="corps news">
	<div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined uppercase green'>Rédaction d'un article</h2>
        <hr style='margin-right:50px'>
    </div>
    <div class="grid">
    	<div class="element vertical-center margin-content">
    		<h4 class='uppercase green'>Rédiger votre article !</h4>
            <hr class='short'>
            <p class='green'><b>Vous souhaitez poster un article ?</b></p>
            <p>En remplissant le formulaire ci-joint, votre article pourra être soumis au modérateur qui pourront le valider ! Votre adresse de connexion vous identifiera en tant qu'auteur de votre article !</p> 
    	</div>
    	<div class="element vertical-center margin-content">
			<form action="index.php?action=addArticle" method="POST">
		        <p>
		        	<label for="email" class="green bold">Email de l'auteur</label>
		        	<input type="email" class='contact corps-yellow' name="email" required autocomplete="off" value="<?php echo $_SESSION['user_email']; ?>" <?php if(!$_SESSION['user_admin']) {?>readonly<?php } ?>>
		  		</p>
		    	<p>
		      		<input type="text" class='contact corps-yellow' name="title" required placeholder="Titre" autocomplete="off">
		 		</p>
		 		<p>
		      		<input type="src" class='contact corps-yellow' name="image" placeholder="Image" autocomplete="off">
		 		</p>
		 		<p>
		      		<textarea class='contact corps-yellow' name="chapo" placeholder="Chapo" required autocomplete="off"></textarea>
		 		</p>
		 		<p>
		      		<textarea class='contact corps-yellow' name="content" placeholder="Article" required autocomplete="off"></textarea>
		 		</p>
		 		<p>
		  			<input type="submit" class="submit btn-green white-shadow bold" value="Envoyer">
				</p>
			</form>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>