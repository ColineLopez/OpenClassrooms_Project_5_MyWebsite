<?php

namespace MyWebsite\Lib\Database;

/**
 * class that allows to connect to the Database
 */
class DatabaseConnection
{
	public ?\PDO $database = null;

	/**
	 * function to connect to the Database
	 * @return the connection to the database
	 */
	public function getConnection() : \PDO
	{
		if ($this->database === null) {
			$this->database = new \PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
		}
		return $this->database;
	}
}
