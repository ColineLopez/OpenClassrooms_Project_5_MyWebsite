<?php

function databaseConnexion(){
	try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
		return $database;
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}
}


function getPosts() {
	
	// Get the data
	$statement = databaseConnexion()->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID ORDER BY creationDate DESC ');

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
	
	// Get the data
	$statement = databaseConnexion()->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID WHERE articleID="'.$postID.'"');

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


function getComments($postID) {
	
	// Get the data
	$statement = databaseConnexion()->query('SELECT * FROM comments WHERE articleID="'.$postID.'"');

	$comments = [];

	while($row = $statement->fetch()){
		$comment = [
			'articleID'    => $row['articleID'],
			'creationDate' => $row['creationDate'],
			'author'        => $row['author'],
			'content'      => $row['content'],
		];

		$comments[] = $comment;
	}

	return $comments;
}
