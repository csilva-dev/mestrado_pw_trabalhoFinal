<title>Dashboard</title>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;background-color: #f2f2f2;">
            <div class="col">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none"><span class="fs-4">DASHBOARD</span></a>
                <hr>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu1">
                    <li>
                        <a href="submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi bi-people"></i><span class="ms-1 d-none d-sm-inline">Utilizadores</span></a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu1">
                            <li class="w-100">
                                <a href="index.php?page=area_reservada&subpage=user" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista</span></a>
                            </li>
                            <li>
                                <a href="index.php?page=area_reservada&subpage=user&cria=" class="nav-link px-0"> <span class="d-none d-sm-inline">Criar Novo</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu2">
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi bi-egg-fried"></i><span class="ms-1 d-none d-sm-inline">Pratos</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu2">
                            <li class="w-100">
                                <a href="index.php?page=area_reservada&subpage=prato" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista</span></a>
                            </li>
                            <li>
                                <a href="index.php?page=area_reservada&subpage=prato&cria=" class="nav-link px-0"> <span class="d-none d-sm-inline">Criar Novo</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                    <li>
                        <a href="index.php?page=area_reservada&subpage=config" class="nav-link px-0 align-middle "><i class="fs-4 bi bi-sliders"></i><span class="ms-1 d-none d-sm-inline">Config</span></a>
                    </li>
                </ul>
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
                case "config":
                    if(isset($_GET['editar'])) {
                        include 'config/executa_edicao.php';
                    } else {
                        include 'config/edita_config.php';
                    }
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
                    include 'pratos/pratos.php';
                    break;
            }
            unset($_GET['subpage']);

            ?>
        </div>
    </div>
</div>

