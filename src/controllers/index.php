<?php

namespace MyWebsite\Controllers\Index;

require_once('src/lib/database.php');
require_once('src/model/post.php');

/**
 * class that get the index template
 */
class Index
{
	/**
	 * 
	 *  function that get the index template
	 */
	public function index() : void
	{
		require('templates/index.php');
	}
	/**
	 * 
	 *  function that get the error page template (redirected automatically whenever action in the url is wrong)
	 */
	public function error() : void
	{
		require('templates/error.php');
	}
}
