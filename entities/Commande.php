	<?PHP
class Commande{
	private $id_com;
	private $id_panier;
	private $methode;
	private $etat;
	function __construct($id_com,$id_panier,$methode,$etat){
		$this->id_com=$id_com;
		$this->id_panier=$id_panier;
		$this->methode=$methode;
		$this->etat=$etat;
	
	}
	
	function getIdCom(){
		return $this->id_com;
	}
	function getIdPanier(){
		return $this->id_panier;
	}
	function getEtat(){
		return $this->etat;
	}
	function getMethode(){
		return $this->methode;
	}

	function setIdCom($id_com){
		$this->id_com=$id_com;
	}
	function setIdPanier($id_panier){
		$this->id_panier;
	}
	function setMethode($methode){
		$this->methode=$methode;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	
}

?>