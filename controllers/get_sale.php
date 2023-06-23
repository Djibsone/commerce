<?php
require_once('../models/sale.php');

//get sales all
$sales = getSales();

//get infos user in session
//$check = getUser($_SESSION['user']['id']);
//$user = $check->fetch();

//get details transaction from id 
if (isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
        
    $output = array('list'=>'');

    $stmt = getTransaction($id);

    $total = 0;
    foreach($stmt as $row){
        $output['transaction'] = $row['pay_id'];
        $output['date'] = date('M d, Y', strtotime($row['sales_date']));
        $subtotal = $row['price']*$row['quantity'];
        $total += $subtotal;
        $output['list'] .= "
            <tr class='prepend_items'>
                <td>".$row['name']."</td>
                <td>&#36; ".number_format($row['price'], 2)."</td>
                <td>".$row['quantity']."</td>
                <td>&#36; ".number_format($subtotal, 2)."</td>
            </tr>
        ";
    }

    $output['total'] = '<b>&#36; '.number_format($total, 2).'<b>';

    echo json_encode($output);
    
}