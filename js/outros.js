function nomeCli(nomeCli){
	if (nomeCli === "login") {
		//window.location.assign("area_reservada.php");
		document.getElementById("area_reservada").innerHTML = nomeCli;
	}	
}


function verificaOrigem() {
	var coiso = window.location.href;
	var array = coiso.split("/");
	return array[array.length - 1];
}
