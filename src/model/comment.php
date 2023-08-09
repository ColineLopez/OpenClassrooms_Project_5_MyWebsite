<?php 

function commentDbConnect(){
	try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
		return $database;
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}
}


function getComments(string $postID) {
	
	// Get the data
	$database= commentDbConnect();
	// $statement = $database->query('SELECT * FROM comments WHERE articleID="'.$postID.'" ORDER BY creationDate DESC');
	$statement = $database->prepare('SELECT * FROM comments WHERE articleID = ? ORDER BY creationDate DESC');
	$statement->execute([$postID]);

	$comments = [];

	while($row = $statement->fetch()){
		$comment = [
			'articleID'    => $row['articleID'],
			'creationDate' => $row['creationDate'],
			'author'       => $row['author'],
			'content'      => $row['content'],
		];

		$comments[] = $comment;
	}

	return $comments;
}



function createComment(string $postID, string $author, string $comment) : bool
{

	$database= commentDbConnect();
	$statement = $database->prepare(
		'INSERT INTO comments(articleID, author, content, creationDate) VALUES (?, ?, ?, NOW())'
	);
	$affectedLines = $statement->execute([$postID, $author, $comment]);

	return ($affectedLines > 0);
}
