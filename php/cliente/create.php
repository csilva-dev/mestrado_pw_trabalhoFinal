<?php

include '../bd/ligaBD.php';
include 'cliente.php';
include 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->role = 'user';
$user->dt_registo = date('Y-m-d H:i:s');
$user->lingua = 'PT';

$cliente = new Cliente($db);

$cliente->nome = $_POST['nome'];
$cliente->morada = $_POST['morada'];
$cliente->cod_postal = $_POST['cod_postal'];
$cliente->localidade = $_POST['localidade'];
$cliente->nif = $_POST['nif'];
$cliente->pais = $_POST['pais'];
$cliente->email = $_POST['email'];

try{
    $db->beginTransaction();
    if ($user->createUser()) {
        $cliente->userUuid = $user->uuid;
        if($cliente->createCliente()){
            echo 'Employee created successfully.';
        } else{
            echo 'Employee could not be created.';
        }
    }
}   
catch(PDOException $ex) {
    $db -> rollBack();
    echo "ERROR: " . $ex->getMessage();
}
$db -> commit();
?>