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
}