<?php 

include ('php/bd/ligaBD.php');

if (isset($_GET['edita'])) {
	$user_uuid = $_GET['edita'];

	$query = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, `role`, username, password, data_registo FROM projetoWEB.cliente WHERE uuid = UUID_TO_BIN('$user_uuid')";

	$resultado = mysqli_query($liga, $query);
	if ($resultado === false) {
		die(mysqli_error());
	}
	$dados1 = mysqli_fetch_assoc($resultado);
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row">
					<h4>Atualiza Utilizador</h4>
				</div>
			</div>
		</div>
		<hr>
		<form id="edita" action="index.php?page=area_reservada&subpage=user&editar=<?php echo $dados1['uuid'];?>" method="POST">
			<div class="row">
				<div class="col">
					<div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">Nome</label>
						<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome" value="<?php echo $dados1['nome']; ?>"  required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput2" class="form-label">Morada</label>
						<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a sua morada" name="morada" value="<?php echo $dados1['morada']; ?>"  required>
					</div>
					<div class="row">
						<div class="col">
							<div class="mb-3">
								<label for="formGroupExampleInput3" class="form-label">Código Postal</label>
								<input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o seu código postal" name="cod_postal" value="<?php echo $dados1['cod_postal']; ?>"  required>
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label for="formGroupExampleInput4" class="form-label">Localidade</label>
								<input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Insira a sua localidade" name="localidade" value="<?php echo $dados1['localidade']; ?>"  required>
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="formGroupExampleInput5" class="form-label">Nº Contribuinte</label>
						<input type="number" class="form-control" id="formGroupExampleInput5" placeholder="Insira o seu número de contribuinte" name="nif" value="<?php echo $dados1['nif'];; ?>" required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput6" class="form-label">Pais</label>
						<select id="formGroupExampleInput6" class="form-select" name="pais" value="<?php echo $dados1['pais']; ?>" placeholder="Escolha uma opção...">
							<option>Portugal</option>
							<option>Espanha</option>
							<option>França</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput9" class="form-label">Email</label>
						<input type="email" class="form-control" id="formGroupExampleInput9" placeholder="Insira o seu nome de utilizador" name="email" value="<?php echo $dados1['email']; ?>"  required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput12" class="form-label">Telefone</label>
						<input type="number" class="form-control" id="formGroupExampleInput12" placeholder="Insira o seu numero de telefone" name="tel" value="<?php echo $dados1['tel'] ?>" required>
					</div>
				</div>
				<div class="col">
					<div class="mb-3">
						<label for="formGroupExampleInput11" class="form-label">Papel</label>
						<select id="formGroupExampleInput11" class="form-select" name="role" value="<?php echo $dados1['role']; ?>" placeholder="Escolha uma opção...">
							<?php if ($dados1['role'] === 'Administrador') {
								?> 
								<option selected><?php echo $dados1['role'];?></option>
								<option>Utilizador</option>
							<?php } elseif ($dados1['role'] === 'Utilizador') {
								?>
								<option selected><?php echo $dados1['role'];?></option>
								<option>Administrador</option>
							<?php } else {
								?>
								<option>Administrador</option>
								<option>Utilizador</option>
							<?php } 
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput7" class="form-label">Nome de Utilizador</label>
						<input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Insira o seu nome de utilizador" name="username" 
						value="<?php echo $dados1['username']; ?>"  required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput8" class="form-label">Palavra Passe</label>
						<input type="password" class="form-control" id="formGroupExampleInput8" placeholder="Insira a sua palavra passe" name="password" value="<?php echo $dados1['password']; ?>"  required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput10" class="form-label">Confirme a Palavra Passe</label>
						<input type="password" class="form-control" id="formGroupExampleInput10" placeholder="Confirme a sua palavra passe" name="password" value="<?php echo $dados1['password']; ?>"  required>
					</div>
				</div>
			</div>
			<div class="d-grid gap-2 col-4 mx-auto">    
				<button id="submit" type="submit" class="btn btn-primary">Atualizar Utilizador</button>
			</div>
		</form>
	</div>
	<?php 
	unset($_GET['edita']);

	if (isset($_POST['editar'])) {
		echo "<script>window.location='listarUsers.php';</script>";	
	} 
}

?>