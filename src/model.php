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


function contactRequest($lastname, $firstname, $email, $message){

	$check = databaseConnexion()->prepare('SELECT lastname, firstname, email, message FROM contact WHERE email = ?');

	$check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();


    if(strlen($lastname)<=25)
    {
        if(strlen($firstname)<=25)
        {
            if(strlen($email)<=100)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $insert = databaseConnexion()->prepare('INSERT INTO contact(lastname, firstname, email, message) VALUES(:lastname, :firstname, :email, :message)');
                        $insert->execute(array(
                            'lastname'     => $lastname,
                            'firstname'  => $firstname,
                            'email'   => $email,
                            'message' => $message));
                        header('Location:../index.php?reg_err=success');
                }else header('Location:../index.php?reg_err=email');
            }else header('Location:../index.php?reg_err=email_length');
        }else header('Location:../index.php?reg_err=firstname_length');
    }else header('Location:../index.php?reg_err=lastname_length');
}