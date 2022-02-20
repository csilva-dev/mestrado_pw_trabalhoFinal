<?php 

$uuid = $_GET['editar'];

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$disponivel_take = ($_POST['disponivel_take'] == 'on') ? 1 : 0 ;
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$destaque = ($_POST['destaque'] == 'on') ? 1 : 0 ;

// File upload path
$targetDir = "img/";
$fileName = basename($_FILES["img"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$query = "";

include ('php/bd/ligaBD.php');

if (!empty($_FILES["img"]["name"])) {

	if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
		
		$query = "UPDATE projetoWEB.prato SET nome='$nome', descricao='$descricao', img='$fileName', preco=$preco, disponivel_take='$disponivel_take', tipo='$tipo', categoria='$categoria', destaque=$destaque WHERE uuid = UUID_TO_BIN('$uuid')";
		if (mysqli_query($liga,$query)) {
			echo "<script>alert('Registo editado com sucesso!');</script>";
			echo "<script>window.location='index.php?page=area_reservada&subpage=prato';</script>";
		} else {
			echo "<script>alert('Não foi possiver criar o registo!');</script>";
		}
	} else{
		$statusMsg = "Sorry, there was an error uploading your file.";
	}

} else {
	$query = "UPDATE projetoWEB.prato SET nome='$nome', descricao='$descricao', img='', preco=$preco, disponivel_take='$disponivel_take', tipo='$tipo', categoria='$categoria' WHERE uuid = UUID_TO_BIN('$uuid')";
	if (mysqli_query($liga,$query)) {
		echo "<script>alert('Registo editado com sucesso!');</script>";
		echo "<script>window.location='index.php?page=area_reservada&subpage=prato';</script>";
	} else {
		echo "<script>alert('Não foi possiver criar o registo!');</script>";
	}
}

?>