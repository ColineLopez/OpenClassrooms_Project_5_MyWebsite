<?php

namespace MyWebsite\Controllers\Contact\ContactPost;

require_once('src/model/contact.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Contact\ContactRepository;

/**
 * class that allows to post a contact request
 */
class ContactPost{

	/**
     * function that allows to post a contact request
     * 
     * @param array $input get the form inputs
     * @throws exception if forms data are invalid.
     */
	public function execute(array $input) : void
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
			$contactRepository->sendMail($lastname, $firstname, $email, $content);
			header('Location: index.php?err=success');
		}
	}
}
