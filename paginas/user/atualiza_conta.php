<?php 

$uuid = $_GET['editar'];

$nome = $_POST['nome'];
$morada = $_POST['morada'];
$cod_postal = $_POST['cod_postal'];
$localidade = $_POST['localidade'];
$nif = $_POST['nif'];
$pais = $_POST['pais'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$tel = $_POST['tel'];

include ('php/bd/ligaBD.php');

$query = "UPDATE projetoWEB.cliente 
SET nome='$nome', morada='$morada', cod_postal='$cod_postal', localidade='$localidade', nif=$nif, pais='$pais', email='$email', role='$role', username='$username', password='$password', tel=$tel WHERE uuid=UUID_TO_BIN('$uuid')";

if (mysqli_query($liga,$query)) {
	echo "<script>alert('Registo atualizado com sucesso!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=';</script>";
} else {
	echo "<script>alert('Não foi possiver atualizar o registo!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=conta';</script>";
}

?>