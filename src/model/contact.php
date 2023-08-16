<?php 

namespace MyWebsite\Model\Contact;

require_once('src/lib/database.php');

use MyWebsite\Lib\Database\DatabaseConnection;

class Contact
{
	public string $lastname;
	public string $firstname;
	public string $email;
	public string $content;
	public string $creationDate;
}

class ContactRepository 
{
	public DatabaseConnection $connection;

	public function contactPost(string $lastname, string $firstname, string $email, string $content): bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO contact(lastname, firstname, email, content, creationDate) VALUES (?, ?, ?, ?, NOW())'
		);
		
		$affectedLines = $statement->execute([$lastname, $firstname, $email, $content]);

		return ($affectedLines > 0);
	}

}