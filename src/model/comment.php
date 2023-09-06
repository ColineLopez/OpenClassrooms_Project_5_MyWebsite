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
			$comment->commentID = $row['commentID'];
			$comment->author = $row['author'];
			$comment->creationDate = $row['creationDate'];
			$comment->content = $row['content'];
			$comment->status = $row['status'];

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

	public function comments2Moderate(): array
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM comments WHERE status = 1 ORDER BY creationDate DESC'
		);
		$statement->execute();

		$comments = [];
		while($row = $statement->fetch()){
			$comment = new Comment();
			$comment->commentID = $row['commentID'];
			$comment->postID = $row['articleID'];
			$comment->author = $row['author'];
			$comment->creationDate = $row['creationDate'];
			$comment->content = $row['content'];
			$comment->status = $row['status'];

			$comments[] = $comment;
		}

		return $comments;
	}

	public function validateComment(float $commentID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE comments SET status=2 WHERE commentID = ?'
		);
		$affectedLines = $statement->execute([$commentID]);

		return ($affectedLines > 0);
	}

	public function rejectComment(float $commentID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE comments SET status=3 WHERE commentID = ?'
		);
		$affectedLines = $statement->execute([$commentID]);

		return ($affectedLines > 0);
	}


}