<?php

require_once 'config.php';

if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
{
	$lastname = htmlspecialchars($_POST['lastname']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$password_retype = htmlspecialchars($_POST['password_retype']);

	$check = $database->prepare('SELECT lastname, firstname, email, password FROM users WHERE email = ?');
	$check->execute(array($email));
	$data = $check->fetch();
	$row = $check->rowCount();

	if($row == 0)
	{
		if(strlen($lastname)<=25)
		{
			if(strlen($firstname)<=25)
			{

				if(strlen($email)<=100)
				{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						if($password == $password_retype)
						{
							$password = hash('sha256', $password);
							$ip = $_SERVER['REMOTE_ADDR'];

							$insert = $database->prepare('INSERT INTO users(lastname, firstname, email, password, ip) VALUES(:lastname, :firstname, :email, :password, :ip)');
							$insert->execute(array(
								'lastname'  => $lastname,
								'firstname' => $firstname,
								'email'     => $email,
								'password'  => $password,
								'ip'        => $ip));
							header('Location:../index.php?action=signup&err=success');

						}else header('Location:../index.php?action=signup&err=password');
					}else header('Location:../index.php?action=signup&err=email');
				}else header('Location:../index.php?action=signup&err=email_length');
			}else header('Location:../index.php?action=signup&err=firstname_length');
		}else header('Location:../index.php?action=signup&err=lastname_length');
	}else header('Location:../index.php?action=signup&err=already');
}