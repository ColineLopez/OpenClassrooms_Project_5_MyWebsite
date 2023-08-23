<?php

namespace MyWebsite\Controllers\Article\ArticleEdition; 

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

class ArticleEdition
{
	public function execute(string $postID)
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;
		$post = $postRepository->getPost($postID);
		
		require('templates/articleedition.php');
	}
}