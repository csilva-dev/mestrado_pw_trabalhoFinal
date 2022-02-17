<?php 

class ClienteService {

	// Connection
	private $conn;

	    // Db connection
	public function __construct($db){
		$this->conn = $db;
	}

	public function getClientes(){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid), nome, morada, cod_postal, localidade, nif, pais, email, username, password, role, dt_registo, lingua FROM cliente";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		return $stmt;
	}

	public function getCliente($clienteUuid){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid), nome, morada, cod_postal, localidade, nif, pais, email, username, password, role, dt_registo, lingua FROM cliente where uuid = UUID_TO_BIN(?)";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->bindParam(1, $clienteUuid);
		$stmt->execute();
		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $dataRow;
	}

        // CREATE
	public function createCliente($cliente){
		$sqlQuery = "INSERT INTO cliente SET uuid=UUID_TO_BIN(:uuid), nome=:nome, morada=:morada, cod_postal=:cod_postal, localidade=:localidade, nif=:nif, pais=:pais, email=:email, user_uuid=UUID_TO_BIN(:userUuid)";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$stmt->bindParam(":uuid", $uuid); 
		$stmt->bindParam(":nome", $nome); 
		$stmt->bindParam(":morada", $morada); 
		$stmt->bindParam(":cod_postal", $cod_postal); 
		$stmt->bindParam(":localidade", $localidade); 
		$stmt->bindParam(":nif", $nif); 
		$stmt->bindParam(":pais", $pais); 
		$stmt->bindParam(":email", $email); 
		$stmt->bindParam(":userUuid", $userUuid); 

		$uuid = $cliente->getUuid(); 
		$nome = $cliente->getNome(); 
		$morada = $cliente->getMorada(); 
		$cod_postal = $cliente->getCodPostal(); 
		$localidade = $cliente->getLocalidade(); 
		$nif = $cliente->getNif(); 
		$pais = $cliente->getPais(); 
		$email = $cliente->getEmail(); 
		$userUuid = $cliente->getUserUuid(); 

		if($stmt->execute()){
			return true;
		}
		return false;
	}      

        // UPDATE
	public function updateCliente($cliente){
		$sqlQuery = "UPDATE cliente SET nome=:nome, morada=:morada, cod_postal=:cod_postal, localidade=:localidade, nif=:nif, pais=:pais, email=:email, user_uuid=UUID_TO_BIN(:userUuid) WHERE uuid = UUID_TO_BIN(:uuid)";

		$stmt = $this->conn->prepare($sqlQuery);

		// bind data
		$stmt->bindParam(":nome", $nome); 
		$stmt->bindParam(":morada", $morada); 
		$stmt->bindParam(":cod_postal", $cod_postal); 
		$stmt->bindParam(":localidade", $localidade); 
		$stmt->bindParam(":nif", $nif); 
		$stmt->bindParam(":pais", $pais); 
		$stmt->bindParam(":email", $email); 
		$stmt->bindParam(":userUuid", $userUuid);
		$stmt->bindParam(":uuid", $uuid); 

		$nome = $cliente->getNome(); 
		$morada = $cliente->getMorada(); 
		$cod_postal = $cliente->getCodPostal(); 
		$localidade = $cliente->getLocalidade(); 
		$nif = $cliente->getNif(); 
		$pais = $cliente->getPais(); 
		$email = $cliente->getEmail(); 
		$userUuid = $cliente->getUserUuid(); 
		$uuid = $cliente->getUuid(); 

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // DELETE
	function deleteCliente($clienteUuid){
		$sqlQuery = "DELETE FROM cliente WHERE uuid = UUID_TO_BIN(?)";

		$stmt = $this->conn->prepare($sqlQuery);

		$stmt->bindParam(1, $clienteUuid);

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