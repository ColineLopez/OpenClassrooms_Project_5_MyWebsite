<?php

namespace MyWebsite\Controllers\User\SignUp;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Sign\SignRepository;

class SignUp
{
	public function signup() 
	{
		require('templates/signup.php');
	}
}
