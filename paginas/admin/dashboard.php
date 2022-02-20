<?php include 'validaSessaoAdm.php' ?>

<script type="text/javascript">
    mudaNavbar('<?php echo $_SESSION['login']; ?>', '<?php echo $_SESSION['role']; ?>');
</script>

<title>Dashboard</title>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"><span class="fs-5 d-none d-sm-inline">DASHBOARD</span></a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0"><i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span></a>
                    </li>
                    <li>
                        <a href="submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi bi-people"></i><span class="ms-1 d-none d-sm-inline">Utilizadores</span></a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="index.php?page=area_reservada&subpage=user" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista</span></a>
                            </li>
                            <li>
                                <a href="index.php?page=area_reservada&subpage=user&cria=" class="nav-link px-0"> <span class="d-none d-sm-inline">Criar Novo</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi bi-egg-fried"></i></i> <span class="ms-1 d-none d-sm-inline">Pratos</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="index.php?page=area_reservada&subpage=prato" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista</span></a>
                            </li>
                            <li>
                                <a href="index.php?page=area_reservada&subpage=prato&cria=" class="nav-link px-0"> <span class="d-none d-sm-inline">Criar Novo</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php?page=area_reservada&subpage=pratos" class="nav-link px-0 align-middle "><i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Pratos</span></a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle"><i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"><span class="d-none d-sm-inline mx-1">loser</span></a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <?php 
            $action = isset($_GET['subpage']) ? $_GET['subpage'] : null;

            switch($action) {
                case "user":
                    if(isset($_GET['edita'])) {
                        include 'utilizadores/edita_user.php';
                    }                        
                    elseif(isset($_GET['editar'])) {
                        include 'utilizadores/executa_edicao.php';
                    }
                    elseif(isset($_GET['apaga'])) {
                        include 'utilizadores/apaga_user.php';
                    }
                    elseif(isset($_GET['cria'])) {
                        include 'utilizadores/cria_user.php';
                    }
                    elseif(isset($_GET['criar'])) {
                        include 'utilizadores/executa_criacao.php';
                    }
                    else {
                        include 'utilizadores/utilizadores.php';
                    }
                    break;
                case "prato":
                    if(isset($_GET['edita'])) {
                        include 'pratos/edita_prato.php';
                    }                        
                    elseif(isset($_GET['editar'])) {
                        include 'pratos/executa_edicao.php';
                    }
                    elseif(isset($_GET['apaga'])) {
                        include 'pratos/apaga_prato.php';
                    }
                    elseif(isset($_GET['cria'])) {
                        include 'pratos/cria_prato.php';
                    }
                    elseif(isset($_GET['criar'])) {
                        include 'pratos/executa_criacao.php';
                    }
                    else {
                        include 'pratos/pratos.php';
                    }
                    break;
                case "categorias":
                include 'categorias.php';
                break;
                case "tipos":
                include 'tipos.php';
                break;
                case "menus":
                include 'menus.php';
                break;
                case "campanhas":
                include 'campanhas.php';
                break;
                default:
                include 'pratos.php';
                break;
            }
            unset($_GET['subpage']);

            ?>
        </div>
    </div>
</div>

