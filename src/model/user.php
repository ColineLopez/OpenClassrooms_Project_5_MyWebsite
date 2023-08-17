<?php 

namespace MyWebsite\Model\User;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class User
{
	public string $lastname;
	public string $firstname;
	public string $email;
	public string $password;
	public string $ip;
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

	public function addUser(string $lastname, string $firstname, string $email, string $password, string $ip): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO users(lastname, firstname, email, password, ip) VALUES (?, ?, ?, ?, ?)'
		);

		$affectedLines = $statement->execute([$lastname, $firstname, $email, $password, $ip]);

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
}