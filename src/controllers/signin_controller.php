<?php

namespace MyWebsite\Controllers\SignIn;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Sign\SignRepository;

class SignIn
{
	public function signin() 
	{
		require('templates/signin_template.php');
	}
}