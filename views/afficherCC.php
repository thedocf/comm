<?PHP
include "../core/CreditCardC.php";
$cc1C=new CreditCardC();
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
<table border="1" id="customers">
<tr>
<td>Id</td>
<td>Nom</td>
<td>Prenom</td>
<td>Numéro de la carte crédit</td>
<td>Date d'expiration</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeCC as $row){
	//if($_GET["id"] == $row['id']){
	?>
	<tr>

	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['numCc']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><form method="POST" action="supprimerCC.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['numCc']; ?>" name="numcc">
	</form>
	</td>
	<td><a href="modifierCC.php?id=<?PHP echo $row['id'].'&numcc='.$row['numCc']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
//}
}
?>
</table>


