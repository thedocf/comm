<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

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
	<style type="text/css">
		.tablePanier{
			width:100%;
			text-align: center;
		}
		.tablePanier th{
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			background-color: red;
			color: white;
		}
		.tablePanier td{
			
			
			
		}

.button-success,
        .button-error
         {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            border: none;
            height: 35px;
            width: 100px;
            margin-left: 30px;
            margin-top: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }


	</style>
</head>
<body>
<form action="" method="post" >
      <table class="tablePanier">
        <h3>panier</h3>

  <tr>
    <th>product</th>
    <th>prix</th> 
    <th>qté</th>
    <th>prix tot</th>
  </tr>
<?php

$sql = "SELECT id, productName, prix, qte FROM panier";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
         // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
              echo '<tr><td>'.$row["productName"].'</td><td>'.$row["prix"].'</td><td>'.'<select onchange("") name"'.$row["id"].'">';
for ($x = 1; $x <= 10; $x++) {
   echo '<option value="'.$x.'">'.$x.'</option>';
} 
  

echo '</select>'.'</td><td>tot</td></tr>';
        }
      } else {
          echo "0 results";
      } 
?>


</table>
<input class="button-success" type="submit" name="success" value="submit">
<input class="button-error" type="submit" name="clear" value="clear">
</form>
<script type="text/javascript">
	function getQte(){
		var x = document.getElementByName("myText").value;
	}

</script>
</body>
</html>
<?php
if (isset($_POST['bb'])){
    $selectedSchool = $_POST['bb'];

   echo $selectedSchool;
}


?>