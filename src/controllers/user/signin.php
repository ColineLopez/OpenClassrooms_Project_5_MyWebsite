<?php

namespace MyWebsite\Controllers\User\SignIn;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Sign\SignRepository;

/**
 * class that get the sign in template
 */
class SignIn
{
	/**
	 * function that get the sign in template
	 */
	public function signin() : void
	{
		require('templates/signin.php');
	}
}
