<?php

namespace MyWebsite\Controllers\ContactPost;

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
			$lastname = $input['lastname'];
			$firstname = $input['firstname'];
			$email = $input['email'];
			$content = $input['content'];

		} else {
			throw new \Exception('Les données du formulaires sont invalides.');
		}

		$contactRepository = new ContactRepository();
		$contactRepository->connection = new DatabaseConnection();
		$success = $contactRepository->contactPost($lastname, $firstname, $email, $content);
		if(!$success) {
			throw new \Exception("Impossible d'envoyer votre demande de contact !");
		} else {
			header('Location: index.php');
		}
	}
}