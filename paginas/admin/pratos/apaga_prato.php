<?php 

$uuid = $_GET['apaga'];

include ('php/bd/ligaBD.php');

$query = "DELETE FROM prato WHERE uuid=UUID_TO_BIN('$uuid')";

if (mysqli_query($liga,$query)) {
	echo "<script>alert('Registo elimidado com sucesso!');</script>";
} else {
	echo "<script>alert('Não foi possiver atualizar o registo!');</script>";
}
echo "<script>window.location='index.php?page=area_reservada&subpage=prato';</script>";

?>