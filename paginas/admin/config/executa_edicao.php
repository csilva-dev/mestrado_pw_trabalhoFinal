<?php 

$uuid = $_GET['editar'];

$max_mesas = $_POST['max_mesas'];
$max_take_away = $_POST['max_take_away'];

include ('php/bd/ligaBD.php');

$query = "UPDATE projetoWEB.config SET max_mesas=$max_mesas, max_take_away=$max_take_away WHERE uuid = UUID_TO_BIN('$uuid')";
if (mysqli_query($liga,$query)) {
	echo "<script>alert('Registo editado com sucesso!');</script>";
} else {
	echo "<script>alert('Não foi possiver criar o registo!');</script>";
}
echo "<script>window.location='index.php?page=area_reservada&subpage=config';</script>";


?>