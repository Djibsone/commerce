<?php
require_once('../models/user.php');

//signup user in db
if (isset($_POST['signup'])) {

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $repassword = htmlspecialchars($_POST['repassword']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = getUserInfo($email);
            $row = $check->rowCount();            
            if ($row > 0) {
                $_SESSION['error'] = "Incorrect email or password";
            } else {
                if ($password === $repassword) {
                    $stmt = addUser($email, sha1($password), $firstname, $lastname);
                    if($stmt){
                        $_SESSION['success'] = "Account created";
                    }
                    else{
                        $_SESSION['error'] = "Account creation error";
                    }
                } else {
                    $_SESSION['error'] = "Passwords are not identical";
                }   
            }
        } else {
            $_SESSION['error'] = "Incorrect email address";
        }
    }else {
        $_SESSION['error'] = "Fill in all fields";
    }
}

header('location: ../views/signup.php');