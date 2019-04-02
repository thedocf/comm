<?PHP
include "../core/CommandeC.php";
$cc1C=new CommandeC();
$listeCC=$cc1C->afficherListCC();

?>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<table border="1" id=customers>
<tr>
<td>Id_com</td>
<td>Id_Panier</td>
<td>Etat</td>
<td>Methode</td>

</tr>

<?PHP
foreach($listeCC as $row){
	//if($_GET["id"] == $row['id']){
	?>
	<tr>

	<td><?PHP echo $row['id_com']; ?></td>
	<td><?PHP echo $row['id_panier']; ?></td>
	<td><?PHP echo $row['etat']; ?></td>
	<td><?PHP echo $row['methode']; ?></td>
	<td><form method="POST" action="AnnulerCommande.php">
	<input type="hidden" value="<?PHP echo $row['etat']; ?>" name="etat">
	<input type="hidden" value="<?PHP echo $row['id_com']; ?>" name="id_com">
	<input type="submit" name="annuler" value="annuler">
	</form>
	</td>
	</tr>
	<?PHP
//}
}
?>
</table>

<?php

if(isset($_GET["trait"]))
{
	if ($_GET["trait"] == 0) {
		echo '<script>alert("Commande deja traitée");</script>';
	}
}
?>
