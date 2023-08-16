<?php

namespace MyWebsite\Model\Post;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class Post
{
	public string $title;
	public string $creationDate;
	public string $content;
	public string $postID;
	public string $chapo;
	public string $author;
}

class PostRepository 
{
	public DatabaseConnection $connection;

	public function getPost(string $postID): Post 
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID WHERE articleID= ? '
		);
		$statement->execute([$postID]);

		$row = $statement->fetch();
		$post = new Post();
		$post->title = $row['title'];
		$post->creationDate = $row['creationDate'];
		$post->content = $row['content'];
		$post->postID = $row['articleID'];
		$post->chapo = $row['chapo'];
		$post->author = $row['name'];

		return $post;
	}


	public function getPosts():array 
	{
		$statement = $this->connection->getConnection()->query(
			'SELECT * FROM articles LEFT JOIN author ON author.authorID=articles.authorID ORDER BY creationDate DESC 
			');

		$posts = [];
		while($row = $statement->fetch()){
			$post = new Post();
			$post->title = $row['title'];
			$post->creationDate = $row['creationDate'];
			$post->content = $row['content'];
			$post->postID = $row['articleID'];
			$post->chapo = $row['chapo'];
			$post->author = $row['name'];

			$posts[] = $post;
		}

		return $posts;
	}

	public function contactRequest(string $lastname, string $firstname, string $email, string $message)
	{
		$statement = $this->connection->getConnection()->prepare('SELECT lastname, firstname, email, message, creationDate FROM contact WHERE email = ?');

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
}

