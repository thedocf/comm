<?PHP
include "../config.php";
class CreditCardC {
function afficherCC ($cc){
		echo "Nom: ".$cc->getNom()."<br>";
		echo "Prénom: ".$cc->getPrenom()."<br>";
		echo "Numéro de la carte: ".$cc->getNumCc()."<br>";
		echo "Date d'expiration: ".$cc->getDate()."<br>";
	}
	
	function ajouterCC($cc){
		$sql="insert into CreditCard (id,nom,prenom,numcc,cvv,date) values (:id, :nom,:prenom,:numcc,:cvv,:date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$cc->getId();
        $nom=$cc->getNom();
        $prenom=$cc->getPrenom();
        $numcc=$cc->getNumCc();
        $cvv=$cc->getCvv();
        $date=$cc->getDate();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numcc',$numcc);
		$req->bindValue(':cvv',$cvv);
		$req->bindValue(':date',$date);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherListCC(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From CreditCard";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCC($numcc){
		$sql="DELETE FROM CreditCard where numCc= :numcc";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':numcc',$numcc);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCC($cc,$id){
		$sql="UPDATE CreditCard SET nom=:nom,prenom=:prenom,numCc=:numcc,cvv=:cvv,date=:date WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$cc->getId();
        $nom=$cc->getNom();
        $prenom=$cc->getPrenom();
        $numcc=$cc->getNumCc();
        $date=$cc->getDate();
        $cvv=$cc->getCvv();
		$datas = array( ':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':numcc'=>$numcc, ':cvv'=>$cvv, ':date'=>$date);
		
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numcc',$numcc);
		$req->bindValue(':cvv',$cvv);
		$req->bindValue(':date',$date);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCC($numcc){
		$sql="SELECT * from CreditCard where numcc=$numcc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>