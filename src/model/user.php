<?php 

namespace MyWebsite\Model\User;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class User
{
	public string $name;
	public string $email;
	public string $password;
	public string $ip;
	public string $admin;
}

class UserRepository 
{
	public DatabaseConnection $connection;

	public function doesUserExist(string $email): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM users WHERE email = ?'
		);
		
		$statement->execute([$email]);
		$data = $statement->fetch();
		$row = $statement->rowCount();

		return $row  == 0 ? FALSE : TRUE;
	}

	public function addUser(string $name, string $email, string $password, string $ip): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO users(name, email, password, ip, admin) VALUES (?, ?, ?, ?, 0)'
		);

		$affectedLines = $statement->execute([$name, $email, $password, $ip]);

		return($affectedLines > 0);
	}

	public function connectUser(string $email, string $password): array
	{
		$password = hash('sha256', $password);

		$statement = $this->connection->getConnection()->prepare(
			'SELECT * FROM users WHERE email = ?'
		);
		$statement->execute([$email]);

		$data = $statement->fetch();

		if($data['password'] === $password){
			return $data;
		} else {
			header('Location: index.php?action=signin&err=password');
		}
	}

	public function isAdmin(string $email): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT admin FROM users WHERE email = ?'
		);

		$statement->execute([$email]);
		$data = $statement->fetch();

		return $data['admin'] == 0 ? FALSE : TRUE;
	}
}
