<?php

namespace MyWebsite\Controllers\User\AdminOperation;

require_once('src/model/admin.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Admin\AdminRepository;

class AdminOperation{

	public function execute(array $input) 
	{
		$lastname = null;
		$firstname = null;
		$email = null;
		$password = null;

		if(!empty($input['email']) && !empty($input['password'])) {
			$email = htmlspecialchars($input['email']);
			$password = htmlspecialchars($input['password']);

		} else {
			header('Location: index.php?action=admin&err=wrong');
		}

		$adminRepository = new AdminRepository();
		$adminRepository->connection = new DatabaseConnection();
		if($adminRepository->doesAdminExist($email)) {
			$admin = $adminRepository->connectAdmin($email, $password);
			
			if(!$admin) {
				header('Location: index.php?action=admin&err=error');
			} else {
				$_SESSION['admin'] = $admin['firstname'] ; //. $admin['lastname'];
				header('Location: index.php');
			}
		} else {
			header('Location: index.php?action=admin&err=unknown');
		}
	}
}
