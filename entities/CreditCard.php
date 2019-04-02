	<?PHP
class CreditCard{
	private $id;
	private $nom;
	private $prenom;
	private $numCc;
	private $cvv;
	private $date;
	function __construct($id,$nom,$prenom,$numCc,$cvv,$date){
		$this->id=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->numCc=$numCc;
		$this->cvv=$cvv;
		$this->date=$date;
	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getNumCc(){
		return $this->numCc;
	}
	function getCvv(){
		return $this->cvv;
	}
	function getDate(){
		return $this->date;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setNumCc($numCc){
		$this->numCc=$numCc;
	}
	function setCvv($cvv){
		$this->cvv=$cvv;
	}
	function setDate($date){
		$this->date=$date;
	}
	
}

?>