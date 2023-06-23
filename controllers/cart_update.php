<?php
	require_once '../models/sale.php';

	$output = array('error'=>false);

	//$id = $_GET['id'];
	$id = $_POST['id'];
	$qty = $_POST['qty'];
	$session = $_SESSION['cart'][$id] = $qty;


	/*if(isset($_SESSION['cart'])){
		try{
			foreach($_SESSION['cart'] as $id => $qty){
				if(isset($_POST['qty'])){
					$session =	$_SESSION['cart'][$id] = $qty;
					$output['message'] = 'Updated';
				}
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}*/
	//var_dump($_SESSION);
	var_dump($session);
//echo json_encode($session);
	/*if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$qty, 'id'=>$id]);
			$output['message'] = 'Updated';
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['productid'] == $id){
				$_SESSION['cart'][$key]['quantity'] = $qty;
				$output['message'] = 'Updated';
			}
		}
	}*/

	
	//echo json_encode($output);

?>