<?php

namespace MyWebsite\Controllers\Article\ArticleEdition; 

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

/**
 * class that allows to edit an article
 */
class ArticleEdition
{
	/**
     * function to get the article we want to edit
     * 
     * @param string $postID ID of the article we want to edit
     */
	public function execute(string $postID) : void
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;
		$post = $postRepository->getPost($postID);
		
		require('templates/articleedition.php');
	}
}
