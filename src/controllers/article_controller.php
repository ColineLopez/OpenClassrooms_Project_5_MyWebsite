<?php

require_once('src/model.php');
require_once('src/model/comment.php');

function article(string $postID)
{
	$post = getPost($postID);
	$comments = getComments($postID);

	require('templates/article_template.php');
}