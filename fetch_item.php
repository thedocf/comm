<?php
include('db_connect.php');
$query = "SELECT * FROM product ORDER BY id DESC";
$statement = $connect->prepare($query);
$output = '';
if($statement->execute())
{
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '
        <div class="col-md-3" style="margin-top:12px;">
            <div style="border:1px solid #333; background-color:#f1f1f1;broder-radius:5px; padding:16px; height:350px;" align="center">
            
                <img src="img/'.$row["image"].'" class="img-responsive" /><br>
                <h4 class="text-info">'.$row["name"].'</h4>
                <h4 class="text-danger">'.$row["price"].'Dt</h4>
                <form action="" method="post">
                <input type="text" name="quantity" id="quantity'.$row["id"].'" class="form-control" value="1"/>
                <input type="hidden" name="hidden-name" id="name'.$row["id"].'" value="'.$row["name"].'" />
                <input type="hidden" name="hidden-id" id="id'.$row["id"].'" value="'.$row["id"].'" />
                <input type="hidden" name="hidden-price" id="price'.$row["id"].'" value="'.$row["price"].'" />
                <input type="submit" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
                </form>
            </div>
        </div>
        ';
    }
    echo $output;
}
?>