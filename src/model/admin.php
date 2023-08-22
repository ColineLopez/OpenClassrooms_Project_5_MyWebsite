<?php 

namespace MyWebsite\Model\Admin;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class Admin
{
	public string $lastname;
	public string $firstname;
	public string $email;
	public string $password;
	public string $ip;
}

class AdminRepository 
{
	public DatabaseConnection $connection;

	public function doesAdminExist(string $email): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM admin WHERE email = ?'
		);
		
		$statement->execute([$email]);
		$data = $statement->fetch();
		$row = $statement->rowCount();

		return $row  == 0 ? FALSE : TRUE;
	}

	public function connectAdmin(string $email, string $password): array
	{
		$password = hash('sha256', $password);

		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM admin WHERE email = ?'
		);
		$statement->execute([$email]);

		$data = $statement->fetch();

		if($data['password'] === $password){
			return $data;
		} else {
			header('Location: index.php?action=admin&err=password');
		}
	}
}