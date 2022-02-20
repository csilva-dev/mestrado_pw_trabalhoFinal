<?php 

include '../bd/ligaBD.php';
include '../entities/Campanha.php';
include '../entities/User.php';
include '../entities/ClienteService.php';
include '../entities/UserService.php';

$database = new Database();
$db = $database->getConnection();

?>