<?php 
require_once '../bd/ligaBD.php';

session_start();

$utilizador = $_POST['user'];
$password = $_POST['pass'];

$sql = mysqli_query($liga, "SELECT * FROM cliente WHERE username='$utilizador' AND password='$password'") or die(mysqli_error($liga));
    echo mysqli_num_rows($sql);
    if(mysqli_num_rows($sql) > 0 ){
        $row = $sql->fetch_assoc();
        $role = $row['role'];
        $_SESSION['login'] = $utilizador;
        $_SESSION['senha'] = $password;
        $_SESSION['role'] = $role;
        $_SESSION['logado']=true;

        header("location: ../../index.php?page=area_reservada&submenu=");
    }
    else{
        $message = "Conta inválida. Insira login e password novamente!";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='../../index.php?page=';
        </script>";
        session_destroy();
   
    }
        
?>