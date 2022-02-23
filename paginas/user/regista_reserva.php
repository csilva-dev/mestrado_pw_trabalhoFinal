<?php 

include 'php/bd/ligaBD.php';

$cliente_uuid = $_SESSION['user_uuid'];

$uuid = uuid();
$data = $_POST['data'];
$periodo = $_POST['periodo'];
$nr_pessoas = $_POST['pessoas'];

$sql2 = mysqli_query($liga, "SELECT (case when max(num) is null then 0 else max(num) end) as num FROM take_away") or die(mysqli_error($liga));
$ln2 = mysqli_fetch_assoc($sql2);
$nr_doc = $ln2['num'];

$query = "INSERT INTO projetoWEB.reservas (uuid, `data`, periodo, pessoas, cliente_uuid, num) VALUES(uuid_to_bin('$uuid'), '$data', '$periodo', $nr_pessoas, uuid_to_bin('$cliente_uuid'), $nr_doc)";

if (mysqli_query($liga,$query)) {
	echo "<script>alert('Registo criado com sucesso!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=';</script>";
} else {
	echo "<script>alert('Não foi possiver criar o registo!');</script>";
	echo "<script>window.location='index.php?page=area_reservada&subpage=';</script>";
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