<?php 

require('src/model.php');

$post = $_GET['id'];

$posts = getPost($post);

$comments = getComments($post);

require('templates/articlecontent.php');