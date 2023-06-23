<?php
require_once('../models/user.php');

	if(isset($_POST['delete'])){
		$id = htmlspecialchars($_POST['id']);

        $stmt = delUser($id);
        if ($stmt) {
            $_SESSION['success'] = 'User deleted successfully';
        } else {
            $_SESSION['error'] = 'Error user deleted';
        }  
	}
	else{
		$_SESSION['error'] = 'Select user to delete first';
	}

	header('location: ../views/users.php');

/*if (isset($_POST['id'])) {

    $id = htmlspecialchars($_POST['id']);

    $result = delUser($id);

    if ($result) {
        echo json_encode(array("statusCode"=>200));
        // return true;
    } 
    else {
        return false;
    }
}*/