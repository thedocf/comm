<?PHP
include "../core/CommandeC.php";
$cc=new CommandeC();
	

if (isset($_POST["etat"])){
	if ( $_POST["etat"] == 0 )
	{
	$cc->supprimerCC($_POST["id_com"]);
	$trait=1;
}
	else 
	{
	$trait=0;
	}
}
header('Location: afficherCommande.php?trait='.$trait);
?>