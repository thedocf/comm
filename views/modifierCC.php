<HTML>
<head>
	<link rel="stylesheet" href="styles/style1.css">
</head>
<body>
<?PHP
include "../entities/CreditCard.php";
include "../core/CreditCardC.php";
if (isset($_GET['numcc'])){
	$CC=new CreditCardC();
    $result=$CC->recupererCC($_GET['numcc']);
	foreach($result as $row){

		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$numcc=$row['numCc'];
		$cvv=$row['cvv'];
		$date=$row['date'];
?>
<form method="POST">
<table>
<caption>Modifier Carte de credit</caption>
<tr>
<td>ID</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>" readonly></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>" required></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>" required></td>
</tr>
<tr>
<td>num de la carte</td>
<td><input type="text" name="numcc" value="<?PHP echo $numcc ?>" minlength="14" maxlength="16" required></td>
</tr>
<tr>
<td>CVV</td>
<td><input type="password" name="cvv" value="<?PHP echo $cvv ?>" minlength="3" maxlength="4" required></td>
</tr>
<?php
        $date = date('Y-m');
        ?>
<tr>
<td>Date d'expiration</td>
<td><input type="month" name="date" value="<?PHP echo $date ?>" min="<?php echo $date ?>" required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}

if (isset($_POST['modifier'])){
	$c1=new CreditCard($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['numcc'],$_POST['cvv'],$_POST['date']);
	$CC->modifierCC($c1,$_POST['id']);

	header('Location: afficherCC.php?id='.$row["id"]);
}
?>
</body>
</HTMl>