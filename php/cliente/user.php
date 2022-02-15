<?php 

class User {

	// Connection
	private $conn;

    // Table
	private $db_table = "user";

    // Columns
	public $uuid;
	public $username;
	public $password;
	public $role;
	public $dt_registo;
	public $lingua;

        // Db connection
	public function __construct($db){
		$this->conn = $db;
		$this->uuid = $this->uuid();
	}

        // GET ALL
	public function getUser($clienteId){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid) as uuid, username,password,role,dt_registo,lingua FROM " . $this->db_table . "where uuid=UUID_TO_BIN(:clienteId)";

		$stmt = $this->conn->prepare($sqlQuery);

		$stmt->bindParam(1, $this->$clienteId);

		$stmt->execute();

		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->uuid = $dataRow['uuid'];
		$this->username = $dataRow['username'];
		$this->password = $dataRow['password'];
		$this->role = $dataRow['role'];
		$this->dt_registo = $dataRow['dt_registo'];
		$this->lingua = $dataRow['lingua'];
	}

        // CREATE
	public function createUser(){
		$sqlQuery = "INSERT INTO
		". $this->db_table ."
		SET
		uuid=UUID_TO_BIN(:uuid),username=:username,password=:password,role=:role,dt_registo=:dt_registo,lingua=:lingua";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$stmt->bindParam(":uuid", $this->uuid);
		$stmt->bindParam(":username", $this->username);
		$stmt->bindParam(":password", $this->password);
		$stmt->bindParam(":role", $this->role);
		$stmt->bindParam(":dt_registo", $this->dt_registo);
		$stmt->bindParam(":lingua", $this->lingua);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // UPDATE
	public function updateEmployee(){
		$sqlQuery = "UPDATE " . $this->db_table . " SET username=:username,password=:password,role=:role,dt_registo=:dt_registo,lingua=:lingua WHERE uuid =UUID_TO_BIN(:id)";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$stmt->bindParam(":username", $this->username);
		$stmt->bindParam(":password", $this->password);
		$stmt->bindParam(":role", $this->role);
		$stmt->bindParam(":dt_registo", $this->dt_registo);
		$stmt->bindParam(":lingua", $this->lingua);
		$stmt->bindParam(":uuid", $this->uuid);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // DELETE
	function deleteEmployee(){
		$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE uuid = ?";
		$stmt = $this->conn->prepare($sqlQuery);


		$stmt->bindParam(1, $this->uuid);

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