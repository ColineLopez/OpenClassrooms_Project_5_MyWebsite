<?php
session_start();

require_once('src/controllers/index.php');
require_once('src/controllers/contact/contactpost.php');
require_once('src/controllers/article/articles.php');
require_once('src/controllers/article/articlewriting.php');
require_once('src/controllers/article/addarticle.php');
require_once('src/controllers/article/articleedition.php');
require_once('src/controllers/article/modifyarticle.php');
require_once('src/controllers/article/articledeletion.php');
require_once('src/controllers/article/article.php');
require_once('src/controllers/article/addcomment.php');
require_once('src/controllers/user/signin.php');
require_once('src/controllers/user/signup.php');
require_once('src/controllers/user/signinoperation.php');
require_once('src/controllers/user/signupoperation.php');
require_once('src/controllers/user/admin.php');
require_once('src/controllers/user/adminoperation.php');

use MyWebsite\Controllers\Index\Index;
use MyWebsite\Controllers\Contact\ContactPost\ContactPost;
use MyWebsite\Controllers\Article\Articles\Articles;
use MyWebsite\Controllers\Article\ArticleWriting\ArticleWriting;
use MyWebsite\Controllers\Article\AddArticle\AddArticle;
use MyWebsite\Controllers\Article\ArticleEdition\ArticleEdition;
use MyWebsite\Controllers\Article\ModifyArticle\ModifyArticle;
use MyWebsite\Controllers\Article\ArticleDeletion\ArticleDeletion;
use MyWebsite\Controllers\Article\Article\Article;
use MyWebsite\Controllers\Article\AddComment\AddComment;
use MyWebsite\Controllers\User\SignIn\SignIn;
use MyWebsite\Controllers\User\SignInOperation\SignInOperation;
use MyWebsite\Controllers\User\SignUp\SignUp;
use MyWebsite\Controllers\User\SignUpOperation\SignUpOperation;
use MyWebsite\Controllers\User\Admin\Admin;
use MyWebsite\Controllers\User\AdminOperation\AdminOperation;

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
		} elseif ($_GET['action'] === 'admin') {
			(new Admin())->admin();
		} elseif ($_GET['action'] === 'adminOperation') {
			(new AdminOperation())->execute($_POST);
		} elseif ($_GET['action'] === 'logout') {
			session_destroy();
			header('Location: index.php');
		} elseif ($_GET['action'] === 'articleWriting') {
			(new ArticleWriting())->articlewriting();
		} elseif($_GET['action'] === 'addArticle') {
			(new AddArticle())->execute($_POST);
		} elseif ($_GET['action'] === 'articleEdition') {
			if (isset($_GET['postID']) && $_GET['postID']>0){
				$postID = $_GET['postID'];

				(new ArticleEdition())->execute($postID);
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			}
		} elseif ($_GET['action'] === 'editArticleOperation') {
			if (isset($_GET['postID']) && $_GET['postID'] > 0) {
				$postID = $_GET['postID'];
				
				(new ModifyArticle())->execute($postID, $_POST);
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			}
		} elseif ($_GET['action'] === 'articleDeletion') {
			if (isset($_GET['postID']) && $_GET['postID'] > 0) {
				$postID = $_GET['postID'];
				
				(new ArticleDeletion())->execute($postID);
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			}
		} elseif ($_GET['action'] === 'deleteArticle') {
			if (isset($_GET['postID']) && $_GET['postID'] > 0) {
				$postID = $_GET['postID'];
				
				(new ArticleDeletion())->delete($postID);
				header('Location: index.php?action=articles');
			} else {
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
			}
		}
		else {
			// throw new Exception("Erreur 404 : La page que vous recherchez n'existe pas.");
			(new Index())->error();
		} 
	} else {
		(new Index())->index();
	}
} catch (Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}