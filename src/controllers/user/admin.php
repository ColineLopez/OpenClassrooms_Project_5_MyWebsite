<?php

namespace MyWebsite\Controllers\User\Admin;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Admin\AdminRepository;
use MyWebsite\Model\Comment\CommentRepository;

/**
 * class that get the comments to moderate
 */
class Admin
{
	/**
     * function that allows to get the comments to moderate
     * 
     */
	public function execute()  : void
	{
		$connection = new DatabaseConnection();

		$commentRepository = new CommentRepository();
		$commentRepository->connection = $connection;
		$comments = $commentRepository->comments2Moderate();

		require('templates/admin.php');
	}
}
