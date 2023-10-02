<?php

namespace MyWebsite\Controllers\Article\ArticleDeletion; 

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

/**
 * class that allows to delete an article
 */
class ArticleDeletion
{
	/**
     * function to get an article and their comments
     * 
     * @param string $postID ID of the article we want to get
     */
	public function execute(string $postID) : void
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;
		$post = $postRepository->getPost($postID);

		require('templates/articledeletion.php');
	}

	/**
     * function to delete an article
     * 
     * @param string $postID ID of the article we want to delete
     */
	public function delete(string $postID) : void
	{
		$connection = new DatabaseConnection();

		$postRepository = new PostRepository();
		$postRepository->connection = $connection;

		$post = $postRepository->deleteArticle($postID);
	}
}
