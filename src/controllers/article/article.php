<?php

namespace MyWebsite\Controllers\Article\Article; 

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/comment.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;
use MyWebsite\Model\Comment\CommentRepository;

class Article
{
	public function execute(string $postID)
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;
		$post = $postRepository->getPost($postID);

		$commentRepository = new CommentRepository();
		$commentRepository->connection = $connection;
		$comments = $commentRepository->getComments($postID);

		require('templates/article.php');
	}
}
