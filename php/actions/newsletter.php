<?php 

include '../bd/ligaBD.php';

$uuid = uuid();
$email = $_POST['email'];

$query = "INSERT INTO projetoWEB.newsletter(uuid, email, `data`) VALUES(uuid_to_bin('$uuid'), '$email', CURRENT_TIMESTAMP)";

if(mysqli_query($liga, $query)) {
	echo "<script>alert('Newsletter subscrita com sucesso!');</script>";
	echo "<script>window.location='../../index.php?page=';</script>";
} else {
	echo "<script>alert('Ocorreu um erro. Por favor, tente mais tarde.');</script>";
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