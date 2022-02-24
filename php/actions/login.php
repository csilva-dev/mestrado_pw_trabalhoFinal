<?php 
require_once '../bd/ligaBD.php';

$utilizador = $_POST['user'];
$password = trim($_POST['pass']);

$query = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, role, username, password, data_registo
FROM projetoWEB.cliente WHERE username='$utilizador' AND password='$password'";

$resultado = mysqli_query($liga, $query);

    if(mysqli_num_rows($resultado) > 0 ){
        $dados = mysqli_fetch_assoc($resultado);
        
        session_start();

        $_SESSION['login'] = $utilizador;
        $_SESSION['role'] = $dados['role'];
        $_SESSION['user_uuid'] = $dados['uuid'];
        $_SESSION['logado']=true;

        header("location: ../../index.php?page=area_reservada&subpage=a");
    }
    else{
        $message = "Conta inválida. Insira login e password novamente!";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='../../index.php?page=login';
        </script>";
        session_destroy();
   
    }
        
?>