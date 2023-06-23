<?php
	require_once('../models/user.php');

	if(isset($_POST['upload'])){
		$id = htmlspecialchars($_POST['id']);
		$photo = $_FILES['photo']['name'];
		$filetmp = $_FILES['photo']['tmp_name'];
		$dossier = '../assets/photo_user/'.$photo;
		if(!empty($filename)){
			move_uploaded_file($filetmp, $dossier);
			$filename = $photo;	
		}
		else {
			$_SESSION['error'] = 'Select user to update photo first';
		}
		
		$stmt = updateUserPhoto($filename, $id);
		
		if ($stmt) {
			$_SESSION['success'] = 'User photo updated successfully';
		} else {
			$_SESSION['error'] = 'Error user photo updated';
		}
	}
	else{
		$_SESSION['error'] = 'Select user to update photo first';
	}

	header('location: ../views/users.php');
?>