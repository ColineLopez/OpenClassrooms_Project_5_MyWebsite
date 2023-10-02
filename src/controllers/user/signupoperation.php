<?php

namespace MyWebsite\Controllers\User\SignUpOperation;

require_once('src/model/user.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\User\UserRepository;

/**
 * class that allows to sign up
 */
class SignUpOperation
{
	/**
     * function that allows to sign up
     * 
     * @param array $input get the form inputs
     * @throws exception if forms data are invalid
     */
	public function execute(array $input) : void
	{
		$name = null;
		$email = null;
		$password = null;
		$passwordConfirmation = null;

		if(!empty($input['name']) && !empty($input['email']) && !empty($input['password']) && !empty($input['passwordConfirmation'])) {
			$name = htmlspecialchars($input['name']);
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
			$password = hash('sha256', $password);
			$user = $userRepository->addUser($name, $email, $password, $ip);
			if(!$user) {
				header('Location : index.php?action=signup&err=error');
			} else {
				header('Location: index.php?action=signup&err=success');
			}
		}
	}
}
