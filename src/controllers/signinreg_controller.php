<?php

require_once('src/model/sign.php');

function signinReg(array $input) 
{
	$email = null;
	$password = null;

	if(!empty($input['email']) && !empty($input['password'])) {
        $email = htmlspecialchars($input['email']);
        $email = strtolower($email);
        $password = htmlspecialchars($input['password']);

    } else {
    	throw new Exception('Les données du formulaires sont invalides.');
    }
    
    $success = connectUser($email, $password);
    if (!$success) {
    	throw new Exception("Impossible de vous connecter !");
    } else {
    	// header('Location: index.php?err=success');
    }
}