<?php

session_start();
$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order-table">
    <table class="table table-bordred table-striped">
    <tr>
        <th width="40%">Product Name</th>
        <th width="10%">Qté</th>
        <th width="20%">Price</th>
        <th width="15%">Total</th>
        <th width="5%">Action</th>
    </tr>
';
if(!empty($_SESSION["shopping_cart"])){
    
    foreach($_SESSION["shopping_cart"] as $keys => $values){

        $output .= '
        <tr>
            
            <td>'.$values["product_name"].'</td>
            <td>'.$values["product_quantity"].'</td>
            <td align="right">'.$values["product_price"].' Dt</td>
            <td align="right">'.number_format($values["product_quantity"]*$values["product_price"],2).' Dt</td>
            <td><form action="" method="post"><input type="hidden" name="hidden-id" value="'.$values["product_id"].'" /> <input type="submit" name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'" value="Remove" /></form></td>
        </tr>
        ';
        
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        $total_item = $total_item + 1;
    }
    $output .='
    <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">'.number_format($total_price, 2).' Dt</td>
        <td></td>
    </tr>
    ';
}else{
    $output .='
    <tr>
        <td colspan="5" align="center">
            your cart is Empty!
        </td>
    </tr>
    
    ';
    $id_user = '1';
    $date_creation = date("Y/m/d");
   

}
$output .= '</table></div>';
$data = array(
    'cart_details'      => $output,
    'total_price'       => number_format($total_price, 2) . 'Dt',
    'total_item'        => $total_item
);
echo json_encode($data);

?>
