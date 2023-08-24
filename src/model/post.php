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
		$post->authorID = $row['authorID'];
		$post->image = $row['image'];

		return $post;
	}

	public function getPosts(): array 
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
			$post->authorID = $row['authorID'];
			$post->image = $row['image'];

			$posts[] = $post;
		}
		return $posts;
	}

	public function createArticle(string $authorID, string $title, string $chapo, string $content, string $image): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO articles(authorID, title, chapo, content, creationDate, image) VALUES (?, ?, ?, ?, NOW(), ?)'
		);
		$affectedLines = $statement->execute([(float)$authorID, $title, $chapo, $content, $image]);

		return ($affectedLines > 0);
	}

	public function modifyArticle(string $postID, string $authorID, string $title, string $chapo, string $content): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE articles SET authorID = ?, title = ?, chapo = ?, content = ?, creationDate = NOW() WHERE articleID = ?'
		);
		$affectedLines = $statement->execute([(float)$authorID, $title, $chapo, $content, $postID]);

		return ($affectedLines > 0);
	}

	public function deleteArticle(string $postID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'DELETE FROM articles WHERE articleID = ?'
		);
		$affectedLines = $statement->execute([(float)$postID]);

		return ($affectedLines > 0);
	}
}