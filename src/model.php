<?php

function dbConnect()
{
	$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
	return $database;
}



function getPosts() {
	
	// Get the data
	$database= dbConnect();
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


function getPost(string $postID) {
	
	// Get the data
	$database= dbConnect();
	$statement = $database->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID WHERE articleID="'.$postID.'"');
	// $statement = databaseConnexion()->query('SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID WHERE articleID= ? ');
	// $statement->execute([$postID]);

	while($row = $statement->fetch()){
		$post = [
			'articleID'    => $row['articleID'],
			'title'        => $row['title'],
			'creationDate' => $row['creationDate'],
			'chapo'        => $row['chapo'],
			'content'      => $row['content'],
			'authorID'     => $row['name'],
		];

	}

	return $post;
}




function contactRequest(string $lastname, string $firstname, string $email, string $message){

	$database= dbConnect();
	$statement = $database->prepare('SELECT lastname, firstname, email, message, creationDate FROM contact WHERE email = ?');

	$statement->execute(array($email));
    $data = $statement->fetch();
    $row = $statement->rowCount();


    if(strlen($lastname)<=25)
    {
        if(strlen($firstname)<=25)
        {
            if(strlen($email)<=100)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $insert = $database->prepare('INSERT INTO contact(lastname, firstname, email, message, creationDate) VALUES(:lastname, :firstname, :email, :message, :creationDate)');
                        $insert->execute(array(
                            'lastname'  => $lastname,
                            'firstname' => $firstname,
                            'email'     => $email,
                            'message'   => $message,
                    		'creationDate' => date("Y-m-d H:i:s"),
                    	));
                        header('Location:../index.php?action=contact&err=success');
                }else header('Location:../index.php?action=contact&err=email');
            }else header('Location:../index.php?action=contact&err=email_length');
        }else header('Location:../index.php?action=contact&err=firstname_length');
    }else header('Location:../index.php?action=contact&err=lastname_length');
}






// 	$statement = $database->prepare('SELECT articleID, author, content FROM comments');

//     $data = $statement->fetch();
//     $row = $statement->rowCount();


//     if(strlen($author)<=255)
//     {
//         $insert = $database->prepare('INSERT INTO comments(articleID, author, content, creationDate) VALUES(:articleID, :author, :content, :creationDate)');
//         $insert->execute(array(
//         	'articleID'    => $postID,
//             'author'       => $author,
//             'content'      => $comment,
//             'creationDate' => date("Y-m-d H:i:s"),
//             ));
//         header('Location:../article.php?postID='.$postID.'&reg_err=success');
//     }else header('Location:../article.php?postID='.$postID.'&reg_err=name_length');
// }