<title>Area Reservada</title>
<div>
    <?php

    session_start();

    if(!isset($_SESSION['logado'])){
        $message = "Tem que iniciar a sessão para aceder a esta funcionalidade!";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='index.php?menu=';
        </script>";
        session_destroy();
    } else {

        $role = isset($_SESSION['role']);

        if ($role==="Administrador") {
            include './paginas/admin/dashboard.php';

        } elseif ($role==="User") {
            include './paginas/user/subMenuUser.php';
        }

    }
    ?>

</div>

