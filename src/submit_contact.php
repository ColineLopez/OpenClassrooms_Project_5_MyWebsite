<?php 

    if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email'])  && isset($_POST['message'])){

        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        contactRequest($lastname, $firstname, $email, $message);
    }