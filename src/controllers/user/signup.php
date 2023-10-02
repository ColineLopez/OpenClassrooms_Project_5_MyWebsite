<?php

namespace MyWebsite\Controllers\User\SignUp;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Sign\SignRepository;

/**
 * class that get the sign up template
 */
class SignUp
{
	/**
	 * function that get the sign up template
	 */
	public function signup() : void
	{
		require('templates/signup.php');
	}
}
