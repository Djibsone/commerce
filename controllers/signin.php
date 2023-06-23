<?php
require_once('../models/user.php');

//login user in db
if (isset($_POST['signin'])) {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = getUserInfo($email);
            $data = $check->fetch();
            $row = $check->rowCount(); 
            if ($row) {
                if (hash_equals($data['email'], $email) && hash_equals($data['password'], sha1($password))) {
                  if ($data['status'] === 1) {
                    $_SESSION['user'] = [
                        'id' => $data['id'],
                        'firstname' => $data['firstname'],
                        'lastname' => $data['lastname'],
                        'email' => $data['email'],
                        'photo' => $data['photo'],
                        'status' => $data['status']
                    ];
                    header('location: ../views/home.php');
                  } else {
                    $_SESSION['success'] = 'BIENVENUE  '.$data['firstname'].'';
                    $_SESSION['user'] = [
                        'id' => $data['id'],
                        'firstname' => $data['firstname'],
                        'lastname' => $data['lastname'],
                        'email' => $data['email'],
                        'photo' => $data['photo'],
                        'status' => $data['status']
                    ];
                    header('location: ../views/profile_user.php');
                  }
                } else {
                    $_SESSION['error'] = "Incorrect email or password";
                    header('location: ../views/signin.php');
                }
            } else {
                $_SESSION['error'] = "Incorrect email or password";
                header('location: ../views/signin.php');
            }
        } else {
            $_SESSION['error'] = "Incorrect email address";
            header('location: ../views/signin.php');
        }
    }else {
        $_SESSION['error'] = "Fill in all fields";
        header('location: ../views/signin.php');
    }
}