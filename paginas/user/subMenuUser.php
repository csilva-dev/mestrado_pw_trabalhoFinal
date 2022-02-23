

<div id="subMenuUser">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?page=area_reservada&subpage=produtos">Pratos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=reservas">Reservas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=encomendas">Histórico</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=conta">Dados Pessoais</a>
        </li>
        <li class="nav-item">
            <a id="carrinho" class="nav-link" href="index.php?page=area_reservada&subpage=carrinho"><i class="bi bi-bag"> <?php $retVal = (isset($_SESSION['carrinho'])) ? count($_SESSION["carrinho"]) : 0;
            echo $retVal;?></i></a>
        </li>
    </ul>
</div>

<div id="content-user">
    <?php 
    $action = isset($_GET['subpage']) ? $_GET['subpage'] : null;

    switch($action) {
        case "produtos":
            include 'produtos.php';
            break;
        case "reservas":
            include 'reservas.php';
            break;
        case "reservas_registo":
            include 'regista_reserva.php';
            break;
        case "encomendas":
            include 'encomendas.php';
            break;
        case "conta":
            include 'conta.php';
            break;
        case "carrinho":
            include 'carrinho.php';
            break;
        case "checkout":
            include 'pagamento.php';
            break;
        case "checkout_final":
            include 'finaliza.php';
            break;

        default:
            include 'produtos.php';
            break;
    }

    ?>

</div>

