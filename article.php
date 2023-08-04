<?php 

require('src/model.php');

$post = $_GET['id'];

$posts = getPost($post);

require('templates/articlecontent.php');