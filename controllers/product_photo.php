<?php
	require_once('../models/product.php');

	if(isset($_POST['upload'])){
		$id = htmlspecialchars($_POST['id']);
		$filename = $_FILES['photo']['name'];
		
		$stmt = getProductExist($id);
		$row = $stmt->fetch();

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/image/'.$new_filename);	
		}
		else {
			$_SESSION['error'] = 'Select user to update photo first';
		}
		
		$stmt = updateProductPhoto($new_filename, $id);
		
		if ($stmt) {
			$_SESSION['success'] = 'Product photo updated successfully';
		} else {
			$_SESSION['error'] = 'Error Product photo updated';
		}
	}
	else{
		$_SESSION['error'] = 'Select Product to update photo first';
	}

	header('location: ../views/products.php');