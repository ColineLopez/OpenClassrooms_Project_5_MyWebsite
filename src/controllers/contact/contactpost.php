<?php

namespace MyWebsite\Controllers\Contact\ContactPost;

require_once('src/model/contact.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Contact\ContactRepository;

class ContactPost{

	public function execute(array $input) 
	{
		$lastname = null;
		$firstname = null;
		$email = null;
		$content = null;

		if(!empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['content'])) {
			$lastname = htmlspecialchars($input['lastname']);
			$firstname = htmlspecialchars($input['firstname']);
			$email = htmlspecialchars($input['email']);
			$content = htmlspecialchars($input['content']);

		} else {
			header('Location: index.php?err=wrong');
		}

		$contactRepository = new ContactRepository();
		$contactRepository->connection = new DatabaseConnection();
		$success = $contactRepository->contactPost($lastname, $firstname, $email, $content);
		if(!$success) {
			header('Location: index.php?err=error');
		} else {
			header('Location: index.php?err=success');
		}
	}
}