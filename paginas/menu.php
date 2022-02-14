<nav class="navbar navbar-expand-md sticky-top navbar-light" style="background-color: #f2f2f2">
	<div class="container-fluid">
		<span class="navbar-brand">MENU</span>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#pastelaria">Pastelaria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#padaria">Padaria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=home#restaurante">Restaurante</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=ondeestamos">Onde Estamos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=contatenos">Contate-nos</a>
				</li>
			</ul>
			<ul class="navbar-nav ms-auto">
				<li class="nav-item" onclick="nomeCli('login')">
					<a class="nav-link" href="index.php?page=login">Area de Cliente</a>
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