<title>Contate-nos</title>

<div class="container" id="registo">
	<h4>Contate-nos</h4>
	<hr>
	<div class="row">
		<div class="col">
			<form class="col-6" name="registo" id="registoForm" action="php/actions/contato.php" method="POST">
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nome</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput2" class="form-label">Email</label>
					<input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Insira o seu email" name="email">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput3" class="form-label">Mensagem</label>
					<textarea class="form-control" id="formGroupExampleInput3" placeholder="Insira a sua mensagem" name="mensagem" rows="5"></textarea>
				</div>
				<div class="d-grid gap-2 col-4 mx-auto">    
                    <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
                </div>
			</form>
		</div>
	</div>
</div>
