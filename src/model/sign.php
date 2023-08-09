<?php 

function signDbConnect()
{
	try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}
	return $database;
}

function connectUser($email, $password)
{
	$database = signDbConnect();
	$statement = $database->prepare(
		'SELECT firstname, lastname, email, password FROM users WHERE email = ?'
	);
	$statement->execute([$email]);

	$data = $statement->fetch();
	$row = $statement->rowCount();

	if($row > 0)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$password = hash('sha256', $password);
			if($data['password'] === $password)
			{
				$_SESSION['user'] = $data['firstname'] . $data['lastname'];
					header('Location: landing.php');
				die();
			}else { header('Location: index.php?action=signin&err=password'); die(); }
		}else { header('Location: index.php?action=signin&err=email'); die();}
	}else { header('Location: index.php?action=signin&err=unknown'); die(); }
	header('Location:index.php');
} 
