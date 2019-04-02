<?PHP
include "../entities/Commande.php";
include "../core/CommandeC.php";

if (isset($_GET['id_panier']) and isset($_POST['methode']) and isset($_POST['etat']) ){
$cc1=new Commande($_POST['id_panier'],$_POST['methode'],$_POST['etat']);
$cc1C=new CommandeC();
$cc1C->ajouterCC($cc1);
header('Location: afficherCommande.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>