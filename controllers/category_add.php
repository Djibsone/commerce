<?php
require_once("../models/category.php");
include '../views/includes/slugify.php';

if(isset($_POST['add'])){
	$name = htmlspecialchars($_POST['name']);
	$cat_slug = slugify($name);

	$check = getCategoryExist($name);
	$data = $check->fetch();
	$row = $check->rowCount();

	if($row > 0){

		/*$_SESSION['category'] = [
			'name' => $data['name'],
			'cat_slug' => $data['cat_slug'],
		];*/
		$_SESSION['error'] = 'Category already exist';
	}
	else{
		
		$stmt = addCategorie($name, $cat_slug);

		if ($stmt) {
			$_SESSION['success'] = 'Category added successfully';
		} else {
			$_SESSION['error'] = 'Error category added';
		}			
	}
}
else{
	$_SESSION['error'] = 'Fill up category form first';
}

header('location: ../views/category.php');