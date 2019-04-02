<?PHP
include "../config.php";
class CommandeC {
function afficherC ($com){
		echo "Id Commande: ".$com->getIdCom()."<br>";
		echo "Id Panier: ".$com->getIdPanier()."<br>";
		echo "Methode: ".$com->getMethode()."<br>";
		echo "Etat: ".$com->getEtat()."<br>";
	}
	
	function ajouterCC($cc){
		$sql="insert into Commande (id_panier,etat,methode) values ( :id_panier,:etat,:methode)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $id_panier=$cc->getIdPanier();
        $etat=0;
        $methode=$cc->getMethode();
      
		
		$req->bindValue(':methode',$methode);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':etat',$etat);
	

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherListCC(){
		$sql="SElECT * From Commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCC($id_com){
		$sql="DELETE FROM Commande where id_com= :id_com";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_com',$id_com);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCC($cc,$id){
		$sql="UPDATE Commande SET etat=:etat WHERE id_com=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$etat=$cc->getEtat();
       
		$datas = array( ':etat'=>$etat);
		
		$req->bindValue(':id',$id);
		
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCC($id_com){
		$sql="SELECT * from Commande where id_com=$id_com";
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