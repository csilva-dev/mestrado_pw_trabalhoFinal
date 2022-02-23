<?php 

include '../bd/ligaBD.php';

$uuid = uuid();
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$query = "INSERT INTO projetoWEB.contato (uuid, nome, email, mensagem) VALUES(uuid_to_bin('$uuid'), '$nome', '$email', '$mensagem')";

if(mysqli_query($liga, $query)) {
	echo "<script>alert('Registo criado com sucesso!');</script>";
	echo "<script>window.location='../../index.php?page=';</script>";
} else {
	echo "<script>alert('Ocorreu um erro ao criar o registo. Por favor, tente mais tarde.');</script>";
	echo "<script>window.location='../../index.php?page=';</script>";
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