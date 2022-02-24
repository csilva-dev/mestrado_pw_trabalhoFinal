<?php 

require_once 'php/bd/ligaBD.php';

//session_start();

$user_uuid = $_SESSION['user_uuid'];

$pag = $_POST['forma_pagamento'];

$total1=0;

//aceder ao array carrinho guardado na sessão e obter o valor e quantidade para calcular valor total
foreach($_SESSION['carrinho'] as $uuid => $qtd){
	$sql = mysqli_query($liga, "SELECT bin_to_uuid(uuid) as uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria FROM projetoWEB.prato WHERE uuid=UUID_TO_BIN('$uuid')") or die(mysqli_error($liga));

	$ln = mysqli_fetch_assoc($sql);

	$prunit = floatval($ln['preco']);
	$total = floatval($prunit)*floatval($qtd);
	$total1+=$total;
}

$sql2 = mysqli_query($liga, "SELECT (case when max(num) is null then 0 else max(num) end) as num FROM take_away") or die(mysqli_error($liga));
$ln2 = mysqli_fetch_assoc($sql2);
$nr_doc = $ln2['num'] + 1;

	//criando a query de inserção à tabela facturas -->caso haja um erro na consulta
$uuid_ft = uuid();
$query = "INSERT INTO take_away (uuid, `data`, cliente_uuid, modo_pag, num, valor) VALUES(uuid_to_bin('$uuid_ft'), now(), UUID_TO_BIN('$user_uuid'), '$pag', $nr_doc, $total1)";

$sql = mysqli_query($liga, $query) or die(mysqli_error($liga));

	//criando a query de inserção à tabela linhafactura
foreach($_SESSION['carrinho'] as $id => $qtd){
	$ln_uuid = uuid();
	$ln_query = "INSERT INTO take_away_linhas (uuid, prato_uuid, qtt, take_away_uuid) VALUES(uuid_to_bin('$ln_uuid'), uuid_to_bin('$id'), $qtd, uuid_to_bin('$uuid_ft'))";

	$sql = mysqli_query($liga, $ln_query) or die(mysqli_error($liga));
}

unset($_SESSION['carrinho']);

echo "<script>alert('Registo inserido com sucesso!');</script>";
echo "<script>window.location='index.php?page=area_reservada&subpage=encomendas';</script>";

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