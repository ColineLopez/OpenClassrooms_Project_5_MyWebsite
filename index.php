<?php

require_once('src/controllers/index_controller.php');
require_once('src/controllers/articles_controller.php');
require_once('src/controllers/article_controller.php');
require_once('src/controllers/contactpost_controller.php');
require_once('src/controllers/signin_controller.php');
require_once('src/controllers/signup_controller.php');
require_once('src/controllers/addcomment_controller.php');
require_once('src/controllers/signinoperation_controller.php');
require_once('src/controllers/signupoperation_controller.php');

use MyWebsite\Controllers\AddComment\AddComment;
use MyWebsite\Controllers\Index\Index;
use MyWebsite\Controllers\Articles\Articles;
use MyWebsite\Controllers\Article\Article;
use MyWebsite\Controllers\ContactPost\ContactPost;
use MyWebsite\Controllers\SignIn\SignIn;
use MyWebsite\Controllers\SignUp\SignUp;
use MyWebsite\Controllers\SignInOperation\SignInOperation;
use MyWebsite\Controllers\SignUpOperation\SignUpOperation;

	try{
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		if ($_GET['action'] === 'articles') {
			(new Articles())->execute();
		}
		elseif ($_GET['action'] === 'contactPost') {
			(new ContactPost())->execute($_POST);
		}
		elseif ($_GET['action'] === 'signin') {
			(new SignIn())->signin();
		}
		elseif ($_GET['action'] === 'signInOperation') {
			(new SignInOperation())->execute($_POST);
		}
		elseif ($_GET['action'] === 'signup') {
			(new SignUp())->signup();
		}
		elseif ($_GET['action'] === 'signUpOperation') {
			(new SignUpOperation())->execute($_POST);
		}
		elseif($_GET['action'] === 'article') {
			if (isset($_GET['postID']) && $_GET['postID']>0){
				$postID = $_GET['postID'];

				(new Article())->execute($postID);
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			}
		} elseif ($_GET['action'] === 'addComment') {
			if (isset($_GET['postID']) && $_GET['postID'] > 0) {
				$postID = $_GET['postID'];

				(new AddComment())->execute($postID, $_POST);
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			} 
		} elseif ($_GET['action'] === 'signinVer') {
			if (!empty($_POST)) {
				signinReg($_POST);
			} else {
				throw new Exception("Erreur : aucun identifiant d'inscription envoyé");
			}
		} else {
			throw new Exception("Erreur 404 : La page que vous recherchez n'existe pas.");
		}
	} else {
		(new Index())->index();
	}
} catch (Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}