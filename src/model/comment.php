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

/**
 * 
 * class that contains methods for the comment
 */
class CommentRepository 
{
	private const WAITING = 1;
	private const VALID = 2;
	private const REFUSED = 3;

	public DatabaseConnection $connection;

	/**
	 * function to get the comment from an article ID
	 * 
	 * @param string $postID the article ID
	 */
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

	/**
	 * function to create the comment in the database
	 * 
	 * @param string $postID the article ID where we put the comment
	 * @param string $author the author from the comment 
	 * @param string $comment the comment
	 */
	public function createComment(string $postID, string $author, string $comment) : bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO comments(articleID, author, content, creationDate) VALUES (?, ?, ?, NOW())'
		);
		$affectedLines = $statement->execute([$postID, $author, $comment]);

		return ($affectedLines > 0);
	}

	/**
	 * 
	 * function to get the comments to moderate
	 */
	public function comments2Moderate(): array
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM comments WHERE :status ORDER BY creationDate DESC'
		);
		$statement->bindValue(':status', self::WAITING, \PDO::PARAM_INT); 
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

	/**
	 * 
	 * function to validate the comments to moderate
	 * 
	 * @param float $commentID the comment ID we want to moderate
	 */
	public function validateComment(float $commentID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
		    'UPDATE comments SET status = :valid, moderationDate = NOW() WHERE commentID = :commentID'
		);

		$statement->bindValue(':valid', self::VALID, \PDO::PARAM_INT); 
		$statement->bindValue(':commentID', $commentID, \PDO::PARAM_INT); 

		$affectedLines = $statement->execute();

		return ($affectedLines > 0);
	}

	/**
	 * 
	 * function to refuse the comments to moderate
	 * 
	 * @param float $commentID the comment ID we want to moderate
	 */
	public function rejectComment(float $commentID): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE comments SET status= :refused, moderationDate=NOW() WHERE commentID = :commentID'
		);

		$statement->bindValue(':refused', self::REFUSED, \PDO::PARAM_INT); 
		$statement->bindValue(':commentID', $commentID, \PDO::PARAM_INT); 

		$affectedLines = $statement->execute();
	
		return($affectedLines > 0);
	}
}
