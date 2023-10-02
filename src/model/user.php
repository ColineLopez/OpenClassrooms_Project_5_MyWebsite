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

/**
 * Class that contains methods for users in database.
 */
class UserRepository 
{
	public DatabaseConnection $connection;

	/**
     * function taht check if user exist in database.
     *
     * @param string $email the email user to verify.
     * @return bool true if user exist, false otherwise.
     */
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

	/**
     * function that add a new user to the database.
     *
     * @param string $name user's name
     * @param string $email user's email
     * @param string $password user's password
     * @param string $ip IP adress of the user
     * @return bool true if succeed, false otherwise.
     */
	public function addUser(string $name, string $email, string $password, string $ip): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO users(name, email, password, ip, admin) VALUES (?, ?, ?, ?, 0)'
		);

		$affectedLines = $statement->execute([$name, $email, $password, $ip]);

		return($affectedLines > 0);
	}

	/**
     * connect user by checking information into the database.
     *
     * @param string $email user's email
     * @param string $password user's password
     * @return array|false user's data if connection succeed, false otherwise.
     */
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

	/**
     * check if a user is admin
     *
     * @param string $email user's email to check
     * @return bool true if user is admin, false otherwise
     */
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
