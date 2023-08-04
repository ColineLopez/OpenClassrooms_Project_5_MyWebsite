<?php 
    require_once "config.php";

    if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email'])  && isset($_POST['message'])){

        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $check = $database->prepare('SELECT lastname, firstname, email, message FROM contact WHERE email = ?');

        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();


        if(strlen($lastname)<=25)
        {
            if(strlen($firstname)<=25)
            {
                if(strlen($email)<=100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $insert = $database->prepare('INSERT INTO contact(lastname, firstname, email, message) VALUES(:lastname, :firstname, :email, :message)');
                            $insert->execute(array(
                                'lastname'     => $lastname,
                                'firstname'  => $firstname,
                                'email'   => $email,
                                'message' => $message));
                            header('Location:../index.php?reg_err=success');
                    }else header('Location:../index.php?reg_err=email');
                }else header('Location:../index.php?reg_err=email_length');
            }else header('Location:../index.php?reg_err=firstname_length');
        }else header('Location:../index.php?reg_err=lastname_length');
    }


?>