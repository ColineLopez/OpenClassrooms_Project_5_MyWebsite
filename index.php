<?php

require_once('src/controllers/index.php');
require_once('src/controllers/contact/contactpost.php');
require_once('src/controllers/article/articles.php');
require_once('src/controllers/article/article.php');
require_once('src/controllers/article/addcomment.php');
require_once('src/controllers/user/signin.php');
require_once('src/controllers/user/signup.php');
require_once('src/controllers/user/signinoperation.php');
require_once('src/controllers/user/signupoperation.php');

use MyWebsite\Controllers\Index\Index;
use MyWebsite\Controllers\Contact\ContactPost\ContactPost;
use MyWebsite\Controllers\Article\Articles\Articles;
use MyWebsite\Controllers\Article\Article\Article;
use MyWebsite\Controllers\Article\AddComment\AddComment;
use MyWebsite\Controllers\User\SignIn\SignIn;
use MyWebsite\Controllers\User\SignInOperation\SignInOperation;
use MyWebsite\Controllers\User\SignUp\SignUp;
use MyWebsite\Controllers\User\SignUpOperation\SignUpOperation;

	try{
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		if($_GET['action'] === 'contactPost') {
			(new ContactPost())->execute($_POST);
		} elseif ($_GET['action'] === 'articles') {
			(new Articles())->execute();
		} elseif($_GET['action'] === 'article') {
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
		} elseif ($_GET['action'] === 'signin') {
			(new SignIn())->signin();
		} elseif ($_GET['action'] === 'signInOperation') {
			(new SignInOperation())->execute($_POST);
		} elseif ($_GET['action'] === 'signup') {
			(new SignUp())->signup();
		} elseif ($_GET['action'] === 'signUpOperation') {
			(new SignUpOperation())->execute($_POST);
		} else {
			throw new Exception("Erreur 404 : La page que vous recherchez n'existe pas.");
		} 
	} else {
		(new Index())->index();
	}
} catch (Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}