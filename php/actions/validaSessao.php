<?php 

if(!isset($_SESSION['logado'])){
	$message = "Tem que iniciar a sessão para aceder a esta funcionalidade!";
	echo "<script type='text/javascript'>alert('$message');
	window.location.href='index.php?page=home';
	</script>";
	session_destroy();
} else {
	$role = $_SESSION['role'];

	if ($role==="Administrador") {
		include './paginas/admin/dashboard.php';

	} elseif ($role==="Utilizador") {
		include './paginas/user/subMenuUser.php';
	}
}

?>