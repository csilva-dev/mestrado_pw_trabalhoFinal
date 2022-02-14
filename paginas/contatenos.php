<title>Contate-nos</title>

<h4>Contate-nos</h4>
<form class="col-4" name="registo" id="registoForm" method="POST" action="../php/atualiza.php?id=<?php echo $dados['id']; ?>">
	<div class="mb-3">
		<label for="formGroupExampleInput" class="form-label">Nome</label>
		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome">
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label">Email</label>
		<input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Insira o seu email">
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput3" class="form-label">Mensagem</label>
		<textarea class="form-control" id="formGroupExampleInput3" placeholder="Insira a sua mensagem" rows="5"></textarea>
	</div>
	<div class="col-auto">
		<center><button type="submit" class="btn btn-primary">Enviar</button></center>
	</div>
</form>

