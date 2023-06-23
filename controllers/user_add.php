<?php
require_once('../models/user.php');

	if(isset($_POST['add'])){
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$address = htmlspecialchars($_POST['address']);
		$contact = htmlspecialchars($_POST['contact']);

		$check = getUserInfo($email);
        $row = $check->rowCount();            
        if ($row > 0) {
		    $_SESSION['error'] = 'Email already taken';
		}
		else{
			$filename = $_FILES['photo']['name'];
			$now = date('Y-m-d');
            $type = $status = $active = 0;
            $reset = '';
            for ($i=0; $i < 8; $i++) { 
                $reset .= mt_rand(0, 8);
            }
            
            //$active = 0;
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/photo_user/'.$filename);	
			}

			$stmt = addUserAdmin($email, sha1($password), $type, $firstname, $lastname, $address, $contact, $filename, $status, $active, $reset, $now);
            if ($stmt) {
                $_SESSION['success'] = 'User added successfully';
            } else {
                $_SESSION['error'] = 'Error user added';
            }
		}
	}
	else{
		$_SESSION['error'] = 'Fill up user form first';
	}

	header('location: ../views/users.php');
