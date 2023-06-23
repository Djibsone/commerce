<?php
require_once('../models/sale.php');
$total = 0;
$output = '';

// Vérifier si la clé "cart" est définie dans $_SESSION
if (isset($_SESSION['cart'])) {
    //liste des produits
    //recuperer les keys du tableau
    $ids = array_keys($_SESSION['cart']);
    //s'il n'y a aucune keys dans le tableau
    if (empty($ids)) {
        unset($_SESSION['success']);
        $_SESSION['error'] = 'Your cart is empty';
    } else {
        //si oui
        $check = getCart_Product($ids);

        foreach($check as $row) {
            //calculer le total ($total(0) + prix unitaire * quantity);;<td><button type='button' data-id='".$row['cartid']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>

            $image = (!empty($row['photo'])) ? '../assets/image/'.$row['photo'] : 'images/noimage.jpg';
                $subtotal = $row['price'] * $_SESSION['cart'][$row['id']];
                $total += $subtotal;
                $output .= "
                    <tr>
                        
                        <td><button type='button' data-id='".$row['id']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
                        <td><img src='".$image."' width='30px' height='30px'></td>
                        <td>".$row['name']."</td>
                        <td>&#36; ". number_format($row['price'],2,',',' ') ."</td>
                        <td>
                            <div class='input-group col-sm-8'>
                                <span class='input-group-btn'>
                                    <button type='button' id='minus' class='btn btn-default btn-flat minus' data-id=".$row['id']."><i class='fa fa-minus'></i></button>
                                </span>
                                <input type='text' class='form-control' value='". $_SESSION['cart'][$row['id']] . "' id='qty_".$row['id']."' name='qty_".$row['id']."'>
                                <span class='input-group-btn'>  
                                <a href='../controllers/cart_update.php?id=".$row['id']."'><button type='button' class='btn btn-default btn-flat'><i class='fa fa-plus'></i></button></a>

                                <button type='button' id='add' class='btn btn-default btn-flat add' data-id=".$row['id']."><i class='fa fa-plus'></i></button>
                                </span>
                            </div>
                        </td>
                        <td id='sub'>&#36; ". number_format($subtotal,2,',',' ') ."</td>
                    </tr>
                ";
            }
            $output .= "
                <tr>
                    <td colspan='5' align='right'><b>Total</b></td>
                    <td id='total'><b>&#36; ". number_format($total,2,',',' ') ."</b></td>
                <tr>
            ";
    }
} else {
    //unset($_SESSION['success']);
    $_SESSION['cart'] = array();
    //$_SESSION['error'] = 'Your cart is empty';
}