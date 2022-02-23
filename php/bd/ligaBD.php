<?php 

$server = "localhost:3306";
$user = "root";
$pwd = "password";
$bd = "projetoWEB";

$liga = mysqli_connect($server, $user, $pwd, $bd);

if (!$liga) {
    //echo "<script>alert('A ligação à base de dados falhou!');</script>";
} else {
    //echo "<script>alert('A ligação à base de dados foi estabelecida com sucesso!');</script>";
}

?>