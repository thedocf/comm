<?PHP
include "../entities/employe.php";
include "../core/employeC.php";

if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['nbH']) and isset($_POST['tarifH'])){
$employe1=new employe($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['nbH'],$_POST['tarifH']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$employe1C=new EmployeC();
$employe1C->ajouterEmploye($employe1);
header('Location: afficherEmploye.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>