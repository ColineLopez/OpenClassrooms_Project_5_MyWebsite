<?php 

namespace MyWebsite\Model\Comment;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class Comment
{
	public string $author;
	public string $creationDate;
	public string $content;
}

class CommentRepository 
{
	public DatabaseConnection $connection;

	public function getComments(string $postID): array
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM comments WHERE articleID = ? ORDER BY creationDate DESC'
		);
		$statement->execute([$postID]);

		$comments = [];
		while($row = $statement->fetch()){
			$comment = new Comment();
			$comment->author = $row['author'];
			$comment->creationDate = $row['creationDate'];
			$comment->content = $row['content'];

			$comments[] = $comment;
		}

		return $comments;
	}

	public function createComment(string $postID, string $author, string $comment) : bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO comments(articleID, author, content, creationDate) VALUES (?, ?, ?, NOW())'
		);
		$affectedLines = $statement->execute([$postID, $author, $comment]);

		return ($affectedLines > 0);
	}
}