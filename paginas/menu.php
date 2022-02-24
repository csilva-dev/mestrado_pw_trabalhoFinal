<nav class="navbar navbar-expand-md sticky-top navbar-dark" style="background-color: #00203F">
	<div class="container">
		<a class="navbar-brand" href="index.php?page=home">
			<img src="img/logo.svg" alt="" width="200" height="">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php?page=home">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#menu">Menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#padaria">Pastelaria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#pastelaria">Padaria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#padaria1">Restaurante</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=ondeestamos">Onde Estamos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=contatenos">Contate-nos</a>
				</li>
			</ul>
			<ul class="navbar-nav ms-auto navbar-dark" id="navbar_">
				<li class="nav-item dropdown">
					<a id="menu_nome" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Area de Cliente</a>
					<ul class="dropdown-menu ms-auto text-dark" aria-labelledby="navbarDropdownMenuLink" style="background-color: #00203F">
						<li>
							<a id="acao" class="nav-link" href="index.php?page=login">Entrar</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div>
	<?php
	$action = isset($_GET['page']) ? $_GET['page'] : null;
	$subpage = isset($_GET['subpage']) ? $_GET['subpage'] : null;
	switch($action){
		
		case "contatenos":
			include 'contatenos.php';
			break;
		case "ondeestamos":
			include 'ondeestamos.php';
			break;
		case "login":
			include 'login.php';
			break;
		case "registo":
			include 'registo.php';
			break;
		case "area_reservada":			
			include 'area_reservada.php';
			break;		

		default:
			include 'home.php';
			break;
	}
	?>
</div>