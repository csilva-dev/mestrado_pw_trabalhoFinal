<?php

include '../bd/ligaBD.php';
include '../entities/Cliente.php';
include '../entities/User.php';
include '../entities/ClienteService.php';
include '../entities/UserService.php';

$database = new Database();
$db = $database->getConnection();

$user = new User();

$user->setUsername($_POST['username']);
$user->setPassword($_POST['password']);
$user->setRole('user');
$user->setDtRegisto(date('Y-m-d H:i:s'));
$user->setLingua('PT');

$cliente = new Cliente();

$cliente->setNome($_POST['nome']);
$cliente->setMorada($_POST['morada']);
$cliente->setCodPostal($_POST['cod_postal']);
$cliente->setLocalidade($_POST['localidade']);
$cliente->setNif($_POST['nif']);
$cliente->setPais($_POST['pais']);
$cliente->setEmail($_POST['email']);

$userService = new UserService($db);
$clienteService = new ClienteService($db);

try{
    $db->beginTransaction();
    if ($userService->createUser($user)) {
        $cliente->setUserUuid($user->getUuid());
        if($clienteService->createCliente($cliente)){
            echo 'Employee created successfully.';
        } else{
            echo 'Employee could not be created.';
        }
    } else {
        echo 'erro user';
    }
}   
catch(PDOException $ex) {
    $db -> rollBack();
    echo "ERROR: " . $ex->getMessage();
    return;
}
$db->commit();
?>