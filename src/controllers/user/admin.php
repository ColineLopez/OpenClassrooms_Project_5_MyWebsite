<?php

namespace MyWebsite\Controllers\User\Admin;

require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Admin\AdminRepository;

class Admin
{
	public function admin() 
	{
		require('templates/admin.php');
	}
}