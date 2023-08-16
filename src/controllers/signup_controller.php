<?php

namespace MyWebsite\Controllers\SignUp;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Sign\SignRepository;

class SignUp
{
	public function signup() 
	{
		require('templates/signup_template.php');
	}
}