function mudaNavbar(user, role) {
	if (role == 'Administrador' || role == 'Utilizador') {
		document.getElementById('menu_nome').innerHTML = 'Bem Vindo, ' + user;
		document.getElementById('acao').innerHTML = 'Sair';
		document.getElementById('acao').href = '?sair';
	} else {
		document.getElementById('username').innerHTML = 'Area de Cliente';
		document.getElementById('acao').innerHTML = 'Entrar';
		document.getElementById('acao').href = "index.php?page=login";
	}	
}