<?php 

try
	{
		$database = new PDO('mysql:host=localhost;dbname=mywebsite;charset=utf8', 'root', '');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage() );
	}