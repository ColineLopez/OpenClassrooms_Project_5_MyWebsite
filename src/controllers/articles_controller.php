<?php

require_once('src/model.php');

function articles(){
	$posts = getPosts();

	require('templates/articles_template.php');
}