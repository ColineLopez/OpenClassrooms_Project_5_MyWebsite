<?php


require_once('src/model.php');

function article($postID){
	$post = getPost($postID);
	$comments = getComments($postID);


	require('templates/article_template.php');
}

