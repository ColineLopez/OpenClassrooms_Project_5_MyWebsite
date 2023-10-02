<?php

namespace MyWebsite\Controllers\Article\Articles;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

/**
 * class that allows to get the articles from the database
 */
class Articles
{
	/**
     * function to get articles from the database
     * 
     */
	public function execute() : void
	{
		$postRepository = new PostRepository();
		$postRepository->connection = new DatabaseConnection();
		$posts = $postRepository->getPosts();

		require('templates/articles.php');
	}
}
