<?php
	session_start();
	require_once 'config.php';


	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		$email = strtolower($email);

		$check = $database->prepare('SELECT firstname, lastname, email, password FROM users WHERE email = ?');
		$check->execute(array($email));
		$data = $check->fetch();
		$row = $check->rowCount();

		if($row > 0)
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$password = hash('sha256', $password);
				if($data['password'] === $password)
				{
					$_SESSION['user'] = $data['firstname'] . $data['lastname'];
					header('Location:../landing.php');
					die();
				}else { header('Location:../signin.php?login_err=password'); die(); }
			}else { header('Location:../signin.php?login_err=email'); die();}
		}else { header('Location:../signin.php?login_err=already'); die(); }
	}else { header('Location:index2.php'); die(); }

?>