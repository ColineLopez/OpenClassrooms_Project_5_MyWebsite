<?php 

require('src/model.php');

$postID = $_GET['postID'];

$post = getPost($postID);

$comments = getComments($postID);

require('templates/article_template.php');