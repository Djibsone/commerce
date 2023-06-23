<?php
require_once("../models/product.php");
include '../views/includes/slugify.php';

if(isset($_POST['add'])){
	$name = htmlspecialchars($_POST['name']);
	$slug = slugify($name);
	$category = htmlspecialchars($_POST['category']);
	$price = htmlspecialchars($_POST['price']);
	$description = htmlspecialchars($_POST['description']);
	$filename = $_FILES['photo']['name'];

	

	$stmt = getProductExist($slug);
	$row = $stmt->fetch();

	if($row['numrows'] > 0){
		$_SESSION['error'] = 'Product already exist';
	}
	else{
		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $slug.'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/image/'.$new_filename);	
		}
		else{
			$new_filename = '';
		}

		$stmt = addProduct($category, $name, $description, $slug, $price, $new_filename);
		if ($stmt) {
		$_SESSION['success'] = 'Product added successfully';
			} else {
			$_SESSION['error'] = 'Error product added';
		}	
	}
}
else{
	$_SESSION['error'] = 'Fill up product form first';
}

header('location: ../views/products.php');
