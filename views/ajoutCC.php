<?PHP
include "../entities/CreditCard.php";
include "../core/CreditCardC.php";

if (isset($_GET["id"]) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['numcc']) and isset($_POST['cvv']) and isset($_POST['date'])){
$cc1=new CreditCard($_GET["id"],$_POST['nom'],$_POST['prenom'],$_POST['numcc'],$_POST['cvv'],$_POST['date']);
$cc1C=new CreditCardC();
$cc1C->ajouterCC($cc1);
header('Location: afficherCC.php?id=1');
	
}else{
	echo "vérifier les champs";
}
//*/

?>