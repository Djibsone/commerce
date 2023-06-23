<?php
require_once('../models/user.php');

	if(isset($_POST['save'])){
		$curr_password = htmlspecialchars($_POST['curr_password']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$photo = $_FILES['photo']['name'];
        $tmpfile = $_FILES['photo']['tmp_name'];
        $dossier = '../assets/photo_user/'.$photo;

        $stmt = getUser($_SESSION['user']['id']);
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

            $stmt = updateAdmin($email, $password, $firstname, $lastname, $filename, $_SESSION['user']['id']);
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

	//header('location: ../views/signout.php');
	header('location: ../views/home.php');