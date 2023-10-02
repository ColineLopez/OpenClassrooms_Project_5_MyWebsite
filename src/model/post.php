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
	public string $name;
}

/**
 * 
 * class that contains methods for articles
 */
class PostRepository 
{
	public DatabaseConnection $connection;

	/**
	 * function to get article informations
	 * 
	 * @param string $postID the article ID 
	 * @return array article
	 */
	public function getPost(string $postID): Post 
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM articles LEFT JOIN users ON articles.email = users.email WHERE articleID = ? '
		);
		$statement->execute([$postID]);

		$row = $statement->fetch();
		$post = new Post();
		$post->title = $row['title'];
		$post->creationDate = $row['creationDate'];
		$post->content = $row['content'];
		$post->postID = $row['articleID'];
		$post->chapo = $row['chapo'];
		$post->email = $row['email'];
		$post->author = $row['name'];
		$post->image = $row['image'];

		return $post;
	}

	/**
	 * function to get articles
	 * 
	 * @return array articles
	 */
	public function getPosts(): array 
	{
		$statement = $this->connection->getConnection()->query(
			'SELECT * FROM articles LEFT JOIN users ON articles.email = users.email ORDER BY creationDate DESC 
			');

		$posts = [];
		while($row = $statement->fetch()){
			$post = new Post();
			$post->title = $row['title'];
			$post->creationDate = $row['creationDate'];
			$post->content = $row['content'];
			$post->postID = $row['articleID'];
			$post->chapo = $row['chapo'];
			$post->email = $row['email'];
			$post->author = $row['name'];
			$post->image = $row['image'];

			$posts[] = $post;
		}
		return $posts;
	}

	/**
	 * function to create an article
	 * 
	 * @param string $email the email from the author
	 * @param string $title 
	 * @param string $chapo
	 * @param string $content
	 * @param string $image  
	 */
	public function createArticle(string $email, string $title, string $chapo, string $content, string $image): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO articles(email, title, chapo, content, creationDate, image) VALUES (?, ?, ?, ?, NOW(), ?)'
		);
		$affectedLines = $statement->execute([$email, $title, $chapo, $content, $image]);

		return ($affectedLines > 0);
	}

	/**
	 * function to edit an article
	 * 
	 * @param string $postID the ID of the article we want to edit
	 * @param string $email the email from the author
	 * @param string $title 
	 * @param string $chapo
	 * @param string $content
	 * @param string $image  
	 */
	public function modifyArticle(string $postID, string $email, string $title, string $chapo, string $content): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE articles SET email = ?, title = ?, chapo = ?, content = ?, creationDate = NOW() WHERE articleID = ?'
		);
		$affectedLines = $statement->execute([$email, $title, $chapo, $content, $postID]);

		return ($affectedLines > 0);
	}

	/**
	 * function to delete an article
	 * 
	 * @param string $postID the article ID we want to delete
	 */
	public function deleteArticle(string $postID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'DELETE FROM articles WHERE articleID = ?'
		);
		$affectedLines = $statement->execute([(float)$postID]);

		return ($affectedLines > 0);
	}
}
