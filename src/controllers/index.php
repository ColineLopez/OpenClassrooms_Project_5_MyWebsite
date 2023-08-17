<?php

namespace MyWebsite\Controllers\Index;

require_once('src/lib/database.php');
require_once('src/model/post.php');

class Index
{
	public function index() 
	{
		require('templates/index.php');
	}
}
