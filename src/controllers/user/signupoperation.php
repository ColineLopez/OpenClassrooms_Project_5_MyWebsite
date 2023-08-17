<?php

namespace MyWebsite\Controllers\User\SignUpOperation;

require_once('src/model/user.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\User\UserRepository;

class SignUpOperation
{
	public function execute(array $input) 
	{
		$lastname = null;
		$firstname = null;
		$email = null;
		$password = null;
		$passwordConfirmation = null;

		if(!empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['password']) && !empty($input['passwordConfirmation'])) {
			$lastname = htmlspecialchars($input['lastname']);
			$firstname = htmlspecialchars($input['firstname']);
			$email = htmlspecialchars($input['email']);
			$password = htmlspecialchars($input['password']);
			$passwordConfirmation = htmlspecialchars($input['passwordConfirmation']);
			$ip = $_SERVER['REMOTE_ADDR'];
		} else {
			header('Location: index.php?action=signup&err=wrong');
		}

		$userRepository = new UserRepository();
		$userRepository->connection = new DatabaseConnection();
		if($userRepository->doesUserExist($email)) {
			header('Location: index.php?action=signup&err=already');
		} elseif ($password != $passwordConfirmation) {
			header('Location: index.php?action=signup&err=password');
		} else {
			$user = $userRepository->addUser($lastname, $firstname, $email, $password, $ip);
			if(!$user) {
				header('Location : index.php?action=signup&err=error');
			} else {
				header('Location: index.php?action=signup&err=success');
			}
		}
	}
}