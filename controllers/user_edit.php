<?php
require_once('../models/user.php');

	/*if(isset($_POST['update'])){
		$id = htmlspecialchars($_POST['id']);
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$address = htmlspecialchars($_POST['address']);
		$contact = htmlspecialchars($_POST['contact']);

		$stmt = getUser($id);
		$row = $stmt->fetch();

		if($password === $row['password']){
			$password = $row['password'];
		}
		else{
			//$password = password_hash($password, PASSWORD_DEFAULT);
			$password = sha1($password);
		}
        $stmt = updateUser($email, $password, $firstname, $lastname, $address, $contact, $id);
        if ($stmt) {
            $_SESSION['success'] = 'User updated successfully';
        } else {
            $_SESSION['error'] = 'Error user updated';
        }	
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: ../views/users.php');*/

    
    //edit user
    if(isset($_POST['save'])){
		$id = htmlspecialchars($_POST['id']);
		$curr_password = htmlspecialchars($_POST['curr_password']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$photo = $_FILES['photo']['name'];
        $tmpfile = $_FILES['photo']['tmp_name'];
        $dossier = '../assets/photo_user/'.$photo;

        $stmt = getUser($id);
		$row = $stmt->fetch();

		if(hash_equals($row['password'], sha1($curr_password))){
			if(!empty($photo)){
				move_uploaded_file($tmpfile, $dossier);
				$filename = $photo;	
			}
			else{
				$filename = $row['photo'];
			}

			if($password == $row['password']){
				$password = $row['password'];
			}
			else{
				$password = sha1($password);
			}

            $stmt = updateAdmin($email, $password, $firstname, $lastname, $filename, $id);
            if ($stmt) {
                $_SESSION['success'] = 'Account updated successfully';
                //$_SESSION['success'] = 'Re-connect';
            } else {
                $_SESSION['error'] = 'Error account updated';
            }	
		}
		else{
			$_SESSION['error'] = 'You are not eligible for this account';
			//$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: ../views/profile_user.php');