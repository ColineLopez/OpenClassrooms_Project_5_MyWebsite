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

	// $statement = $database->query('SELECT articleID, title, chapo, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\'), authorID FROM articles ORDER BY date DESC');

	$statement = $database->query('SELECT articleID, title, chapo, content, creationDate, authorID FROM articles ORDER BY creationDate DESC');

	$posts = [];

	while($row = $statement->fetch()){
		$post = [
			'title'        => $row['title'],
			'creationDate' => $row['creationDate'],
			'chapo'        => $row['chapo'],
			'content'      => $row['content'],
			'authorID'     => $row['authorID'],
		];

		$posts[] = $post;
	}

	return $posts;
}
