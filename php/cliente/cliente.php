<?php 

class Cliente {

	// Connection
	private $conn;

    // Table
	private $db_table = "cliente";

    // Columns
	public $uuid;
	public $nome;
	public $morada;
	public $cod_postal;
	public $localidade;
	public $nif;
	public $pais;
	public $email;
	public $userUuid;

        // Db connection
	public function __construct($db){
		$this->conn = $db;
	}

        // GET ALL
	public function getClientes(){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid), nome, morada, cod_postal, localidade, nif, pais, email, username, password, role, dt_registo, lingua FROM " . $this->db_table . "";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		return $stmt;
	}

        // CREATE
	public function createCliente(){
		$sqlQuery = "INSERT INTO
		". $this->db_table ."
		SET
		uuid=UUID_TO_BIN(:uuid), nome=:nome, morada=:morada, cod_postal=:cod_postal, localidade=:localidade, nif=:nif, pais=:pais, email=:email, user_uuid=UUID_TO_BIN(:userUuid)";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$stmt->bindParam(":uuid", $this->uuid()); 
		$stmt->bindParam(":nome", $this->nome); 
		$stmt->bindParam(":morada", $this->morada); 
		$stmt->bindParam(":cod_postal", $this->cod_postal); 
		$stmt->bindParam(":localidade", $this->localidade); 
		$stmt->bindParam(":nif", $this->nif); 
		$stmt->bindParam(":pais", $this->pais); 
		$stmt->bindParam(":email", $this->email); 
		$stmt->bindParam(":userUuid", $this->userUuid); 

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // UPDATE
	public function getSingleCliente(){
		$sqlQuery = "SELECT
		id, 
		name, 
		email, 
		age, 
		designation, 
		created
		FROM
		". $this->db_table ."
		WHERE 
		id = ?
		LIMIT 0,1";

		$stmt = $this->conn->prepare($sqlQuery);

		$stmt->bindParam(1, $this->id);

		$stmt->execute();

		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->name = $dataRow['name'];
		$this->email = $dataRow['email'];
		$this->age = $dataRow['age'];
		$this->designation = $dataRow['designation'];
		$this->created = $dataRow['created'];
	}        

        // UPDATE
	public function updateCliente(){
		$sqlQuery = "UPDATE
		". $this->db_table ."
		SET
		name = :name, 
		email = :email, 
		age = :age, 
		designation = :designation, 
		created = :created
		WHERE 
		id = :id";

		$stmt = $this->conn->prepare($sqlQuery);

		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->age=htmlspecialchars(strip_tags($this->age));
		$this->designation=htmlspecialchars(strip_tags($this->designation));
		$this->created=htmlspecialchars(strip_tags($this->created));
		$this->id=htmlspecialchars(strip_tags($this->id));

            // bind data
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":age", $this->age);
		$stmt->bindParam(":designation", $this->designation);
		$stmt->bindParam(":created", $this->created);
		$stmt->bindParam(":id", $this->id);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // DELETE
	function deleteCliente(){
		$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
		$stmt = $this->conn->prepare($sqlQuery);

		$this->id=htmlspecialchars(strip_tags($this->id));

		$stmt->bindParam(1, $this->id);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	function uuid() {
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

}

?>