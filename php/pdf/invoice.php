<?php

include '../bd/ligaBD.php';

$uuidFT = $_GET['uuid'];

$query = "SELECT bin_to_uuid(uuid) as uuid, `data`, bin_to_uuid(cliente_uuid) as cliente_uuid, modo_pag, num FROM projetoWEB.take_away where uuid = UUID_TO_BIN('$uuidFT')";

$resultado = mysqli_query($liga, $query);
$cabecalho = mysqli_fetch_assoc($resultado);

if (! empty($cabecalho)) {
    $ta_uuid = $cabecalho['uuid'];
    $query1 = "SELECT bin_to_uuid(uuid) as uuid, bin_to_uuid(prato_uuid) as prato_uuid, qtt, bin_to_uuid(take_away_uuid) as take_away_uuid FROM projetoWEB.take_away_linhas where take_away_uuid = UUID_TO_BIN('$ta_uuid')";

    $linhas = mysqli_query($liga, $query1);
    $index = 0;
    $linhas_array = [];
    while ($dados = mysqli_fetch_assoc($linhas)) {
        $linhas_array[$index] = $dados;
        $index++;
    }

    //print_r($linhas_array);

    $cliente_uuid = $cabecalho['cliente_uuid'];
    $query3 = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, `role`, username, password, data_registo 
    FROM projetoWEB.cliente WHERE uuid = UUID_TO_BIN('$cliente_uuid')";

    $resultado1 = mysqli_query($liga, $query3);
    $cliente = mysqli_fetch_assoc($resultado1);

    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($cabecalho, $linhas_array, $cliente);
}