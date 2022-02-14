<div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?page=area_reservada&subpage=produtos">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=reservas">Reservas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=encomendas">Encomendas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=area_reservada&subpage=conta">Dados Pessoais</a>
        </li>
    </ul>
</div>

<div>
    <?php 
    $action = isset($_GET['subpage']) ? $_GET['subpage'] : null;

    switch($action) {
        case "produtos":
            include 'produtos.php';
            break;
        case "reservas":
            include 'reservas.php';
            break;
        case "encomendas":
            include 'encomendas.php';
            break;
        case "conta":
            include 'conta.php';
            break;
        default:
            include 'produtos.php';
            break;
    }

    ?>
          
</div>

