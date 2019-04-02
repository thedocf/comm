<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "cart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    
    .popover{width:auto!important; max-width: 500px; text-align: center;}
    </style>
</head>
<body>
<div class="container">
   <br />
   <h3 align="center">PHP Ajax Shopping Cart by using Bootstrap Popover</h3>
   <br />
   <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Menu</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
      <a class="navbar-brand" href="/">Webslesson</a>
     </div>
     
     <div id="navbar-cart" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li>
        <a id="cart-popover" class="btn"  data-placement="bottom" title="Shopping Cart">
         <span class="glyphicon glyphicon-shopping-cart"></span>
         <span class="badge"></span>
         <span class="total_price">$ 0.00</span>
        </a>
       </li>
      </ul>
     </div>
     
    </div>
   </nav>
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">

     <a href="#"  class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="?clear=true" name="clear" onclick="form.submit();" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
     
    </div>
   </div>

   <div id="display_item">


   </div>
   
  </div>

    
    
    <script>
        $('#cart-popover').popover({
        html : true,
        container: 'body',
        content:function(){
        return $('#popover_content_wrapper').html();
        }
});
    $(document).ready(function(){
        load_product();
        load_cart_data();
        function load_product()
        {
            $.ajax({
                url:"fetch_item.php",
                method:"POST",
                success:function(data)
                {
                    $('#display_item').html(data);
                    
                }
            });
        }
    function load_cart_data()
        {
            $.ajax({
                url:"fetch_cart.php",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                   $('#cart_details').html(data.cart_details);
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
                   
                }
            });
             
        }

        
        $(document).on('click', '.add_to_cart', function(){
        var product_id = $(this).attr("id");
        var product_name = $('#name'+product_id+'').val();
        var product_price = $('#price'+product_id+'').val();
        var product_quantity = $('#quantity'+product_id).val();
        var action = "add";
  if(product_quantity > 0)
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
    success:function(data)
    {
     load_cart_data();
     alert("Item has been Added into Cart");
    }
   });
  }
  else
  {
   alert("please Enter Number of Quantity");
  }
 });
        $(document).on('click','.delete',function(){
            var product_id = $(this).attr("id");
            var action = 'remove';
            if(confirm("Are you sure you want to reemove this product?")){
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{product_id:product_id, action:action},
                    success:function()
                    {
                        load_cart_data();
                        $('#cart-popover').popover('hide');
                        alert("Item has been removed!");
                    }
                    
                });
            }
            else{
                return false;
            }
        });
        $(document).on('click', '#clear_cart', function(){
            var action = 'empty';
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function()
                {
                    load_cart_data();
                    $('#cart-popover').popover('hide');
                    alert("your cart has been cleared!");
                }
                
            });
        });
    });
    
    </script>
   
</body>
</html>
 <?php
////
$user_id = $_GET["user"];
$trv = 1;
$etat = 0;
$id_panier = 1;
$date_creation = date("Y/m/d");
   $sql = "SELECT * FROM panier ORDER BY ID DESC WHERE id_user = '".$user_id."'";
    $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)) {
              if($row["etat"] == 0)
              {
                  $trv =0;
                  $id_panier = $row["id_panier"];
              }
        }
if($trv == 1)
{
$sql = "INSERT INTO panier (id_user, date_creation, etat)
VALUES ('".$user_id."', '".$date_creation."', '".$etat."')";

if (mysqli_query($conn, $sql)) {
    $id_panier = mysqli_insert_id($conn);
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
///
if(isset($_POST['add_to_cart'])){
$product=$_POST['hidden-id'];
$qte=$_POST['quantity'];
    $exist=0;
    $sql = "SELECT id_produit, quantite FROM panierproduit";
      $result = mysqli_query($conn, $sql);

  
         // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
              if($row["id_produit"] == $product)
              {
                  $exist =1;
                  $nQte= $row["quantite"]+1;
                  $sql = "UPDATE panierproduit SET quantite='".$nQte."' WHERE id_produit='".$product."'";

                  if (mysqli_query($conn, $sql)) {
                      echo "Record updated successfully";
                  } else {
                      echo "Error updating record: " . mysqli_error($conn);
                  }
              }
        }
      
if($exist == 0){
    $sql = "INSERT INTO panierproduit (id_produit, quantite, id_panier)
VALUES ('".$product."', '".$qte."', '".$id_panier."')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
if(isset($_GET['clear'])){
  
    $sql = "DELETE FROM panierproduit WHERE id_panier=1";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

}
if(isset($_POST['delete'])){
    echo "delete clicked";
    $id_tdelete = $_POST["hidden-id"];
     $sql = "DELETE FROM panierproduit WHERE id_produit='".$id_tdelete."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

}
    
    ?>