<?php

require_once('src/controllers/index_controller.php');
require_once('src/controllers/articles_controller.php');
require_once('src/controllers/article_controller.php');
require_once('src/controllers/contact_controller.php');
require_once('src/controllers/signin_controller.php');
require_once('src/controllers/signup_controller.php');

if(isset($_GET['action']) && $_GET['action'] !== '') {
	if($_GET['action'] === 'articles') {
		articles();
	}
	elseif($_GET['action'] === 'contact') {
		contact();
	}
	elseif($_GET['action'] === 'signin') {
		signin();
	}
	elseif($_GET['action'] === 'signup') {
		signup();
	}
	elseif($_GET['action'] === 'article') {
		if(isset($_GET['postID']) && $_GET['postID']>0){
			$postID = $_GET['postID'];

			article($postID);
		} else {
			echo 'Erreur : aucun identifiant de billet envoyé';

			die;
		}
	} else {
		echo "Erreur 404 : La page que vous recherchez n'existe pas.";
	}
} else {
	index();
}