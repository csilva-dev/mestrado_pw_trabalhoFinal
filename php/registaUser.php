<?php 

$uuidUS = uuid();
$nome_utilizador = $_POST['username'];
$pass = $_POST['password'];
$role = 'User';
$dt_registo = date('Y-m-d h:m:s');
$lingua = 'PT';

$uuidCL = uuid();
$nome = $_POST['nome'];
$morada = $_POST['morada'];
$cod_postal = $_POST['cod_postal'];
$localidade = $_POST['localidade'];
$nif = $_POST['nif'];
$pais = $_POST['pais'];
$email = $_POST['email'];

include('bd/ligaBD.php');

$queryUser = "insert into user ()"

$query = "insert into carro (marca, modelo, nrchassi, matricula, cilindrada, ano, preco) values ('$marca', '$modelo', '$nrchassi', '$matricula', '$cilindrada', '$ano', '$preco')";

try {
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Registo inserido com sucesso!');</script>";
	} else {
		echo "<script>alert('Erro: '.$query.'<br>'.mysqli_error($liga)');</script>";
	}
}catch(Exception $ex) {
	echo "<script>alert('Erro: '.$query.'<br>'.mysqli_error($liga)');</script>";
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


?>