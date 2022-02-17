<?php 

class UserService {

		// Connection
	private $conn;


	    // Db connection
	public function __construct($db){
		$this->conn = $db;
	}

	public function getUsers(){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid) as uuid, username,password,role,dt_registo,lingua FROM user";

		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();

		return $stmt;
	}

	public function getUser($clienteId){
		$sqlQuery = "SELECT BIN_TO_UUID(uuid) as uuid, username,password,role,dt_registo,lingua FROM user where uuid=UUID_TO_BIN(:clienteId)";

		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->bindParam(1, $this->$clienteId);
		$stmt->execute();
		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

		return $dataRow;
	}

        // CREATE
	public function createUser($user){
		$sqlQuery = "INSERT INTO user SET uuid=UUID_TO_BIN(:uuid),username=:username,password=:password,role=:role,dt_registo=:dt_registo,lingua=:lingua";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$stmt->bindParam(":uuid", $uuid);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->bindParam(":role", $role);
		$stmt->bindParam(":dt_registo", $dt_registo);
		$stmt->bindParam(":lingua", $lingua);

		$uuid = $user->getUuid();
		$username = $user->getUsername();
		$password = $user->getPassword();
		$role = $user->getRole();
		$dt_registo = $user->getDtRegisto();
		$lingua = $user->getLingua();

		if($stmt->execute()){
			return true;
		}
		return false;
	}

        // UPDATE
	public function updateUser($user){
		$sqlQuery = "UPDATE user SET username=:username,password=:password,role=:role,dt_registo=:dt_registo,lingua=:lingua WHERE uuid = UUID_TO_BIN(:uuid)";

		$stmt = $this->conn->prepare($sqlQuery);

            // bind data
		$username = $user->getUsername();
		$password = $user->getPassword();
		$role = $user->getRole();
		$dt_registo = $user->getDtRegisto();
		$lingua = $user->getLingua();
		$uuid = $user->getUuid();


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
	function deleteUser($userUuid){
		$sqlQuery = "DELETE FROM user WHERE uuid = ?";

		$stmt = $this->conn->prepare($sqlQuery);

		$stmt->bindParam(1, $userUuid);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

}

?>