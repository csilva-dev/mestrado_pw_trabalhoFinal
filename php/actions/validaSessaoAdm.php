<?php 

session_start();

if(!isset($_SESSION['login']) === 'Administrador'){
	$message = "Tem que iniciar a sessão para aceder a esta funcionalidade!";
	echo "<script type='text/javascript'>alert('$message');
	window.location.href='index.php?menu=';
	</script>";
	session_destroy();
}

 ?>