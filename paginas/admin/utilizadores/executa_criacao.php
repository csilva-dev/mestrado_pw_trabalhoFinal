<?php 

$uuid = uuid();

$nome = $_POST['nome'];
$morada = $_POST['morada'];
$cod_postal = $_POST['cod_postal'];
$localidade = $_POST['localidade'];
$nif = $_POST['nif'];
$pais = $_POST['pais'];
$email = $_POST['email'];
$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

include ('php/bd/ligaBD.php');

$query = "INSERT INTO projetoWEB.cliente
		(uuid, nome, morada, cod_postal, localidade, nif, pais, email, `role`, username, password, data_registo)
VALUES (uuid_to_bin('$uuid'), '$nome', '$morada', '$cod_postal', '$localidade',$nif, '$pais', '$email', '$role', '$username', '$password', now());
";

if (mysqli_query($liga,$query)) {
	echo "<script>alert('Registo criado com sucesso!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=user';</script>";
} else {
	echo "<script>alert('Não foi possiver criar o registo!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=user';</script>";
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