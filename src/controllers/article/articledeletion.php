<?php

namespace MyWebsite\Controllers\Article\ArticleDeletion; 

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

class ArticleDeletion
{
	public function execute(string $postID)
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;
		$post = $postRepository->getPost($postID);

		require('templates/articledeletion.php');
	}

	public function delete(string $postID)
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;

		$post = $postRepository->deleteArticle($postID);
	}
}
