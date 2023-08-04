<?php

function getPosts() {
	
	// Database connection
	try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}

	// Get the data
	$statement = $database->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID ORDER BY creationDate DESC ');

	$posts = [];

	while($row = $statement->fetch()){
		$post = [
			'articleID' => $row['articleID'],
			'title'        => $row['title'],
			'creationDate' => $row['creationDate'],
			'chapo'        => $row['chapo'],
			'content'      => $row['content'],
			'authorID'     => $row['name'],
		];

		$posts[] = $post;
	}

	return $posts;
}


function getPost(float $postID) {
	
	// Database connection
	try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}

	// Get the data
	$statement = $database->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID WHERE articleID="'.$postID.'"');

	$posts = [];

	while($row = $statement->fetch()){
		$post = [
			'articleID' => $row['articleID'],
			'title'        => $row['title'],
			'creationDate' => $row['creationDate'],
			'chapo'        => $row['chapo'],
			'content'      => $row['content'],
			'authorID'     => $row['name'],
		];

		$posts[] = $post;
	}

	return $posts;
}




