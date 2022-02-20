<?php 

$uuid = uuid();

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
		
		$query = "INSERT INTO projetoWEB.prato
		(uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria, destaque)
		VALUES(uuid_to_bin('$uuid'), '$nome', '$descricao','$fileName', $preco, $disponivel_take, '$tipo', '$categoria', $destaque)";
		if (mysqli_query($liga,$query)) {
			echo "<script>alert('Registo criado com sucesso!');</script>";
			echo "<script>window.location='index.php?page=area_reservada&subpage=prato';</script>";
		} else {
			echo "<script>alert('Não foi possiver criar o registo!');</script>";
		}
	} else{
		$statusMsg = "Sorry, there was an error uploading your file.";
	}

} else {
	$query = "INSERT INTO projetoWEB.prato
	(uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria)
	VALUES(uuid_to_bin('$uuid'), '$nome', '$descricao','', $preco, $disponivel_take, '$tipo', '$categoria')";
	
	if (mysqli_query($liga,$query)) {
		echo "<script>alert('Registo criado com sucesso!');</script>";
		echo "<script>window.location='index.php?page=area_reservada&subpage=prato';</script>";
	} else {
		echo "<script>alert('Não foi possiver criar o registo!');</script>";
	}
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