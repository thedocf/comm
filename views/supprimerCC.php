<?PHP
include "../core/CreditCardC.php";
$cc=new CreditCardC();
	

if (isset($_POST["numcc"])){
	$cc->supprimerCC($_POST["numcc"]);
	header('Location: afficherCC.php');
}

?>