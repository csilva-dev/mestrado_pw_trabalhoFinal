<?php 

include ('php/bd/ligaBD.php');

if (isset($_GET['edita'])) {
	$prato_uuid = $_GET['edita'];

	$query = "SELECT bin_to_uuid(uuid) as uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria, destaque FROM projetoWEB.prato WHERE uuid = UUID_TO_BIN('$prato_uuid')";

	$resultado = mysqli_query($liga, $query);
	if ($resultado === false) {
		die(mysqli_error());
	}
	$dados1 = mysqli_fetch_assoc($resultado);
	$disponivel_take = ($dados1['disponivel_take'] == 1) ? 'on' : 'off' ;
	$destaque = ($dados1['destaque'] == 1) ? 'on' : 'off' ;
	?>
	<div class="container" style="min-height: 55.8vh;">
		<div class="row">
			<div class="col">
				<div class="row">
					<h4>Edita Prato</h4>
				</div>
			</div>
		</div>
		<hr>
		<form id="edita" action="index.php?page=area_reservada&subpage=prato&editar=<?php echo $prato_uuid; ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col">					
					<div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">Nome</label>
						<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o nome" name="nome" value="<?php echo $dados1['nome']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput2" class="form-label">Descrição</label>
						<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a descrição" name="descricao" value="<?php echo $dados1['descricao']; ?>" required>
					</div>

					<div class="mb-3">
						<label for="formGroupExampleInput3" class="form-label">Preço (€)</label>
						<input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o preço" name="preco" value="<?php echo $dados1['preco']; ?>" required>
					</div>
					<div class="mb-3">
						<input type="checkbox" class="form-check-input" id="formGroupExampleInput4" name="disponivel_take" checked="<?php echo $disponivel_take; ?>" >
						<label for="formGroupExampleInput4" class="form-check-label">Disponivel Take-Away</label>
					</div>
					<div class="mb-3">
						<input type="checkbox" class="form-check-input" id="formGroupExampleInput8" name="destaque" checked="<?php echo $destaque; ?>">
						<label for="formGroupExampleInput8" class="form-check-label">Aparece nos Destaques</label>
					</div>
				</div>
				<div class="col">		
					<div class="mb-3">
						<label for="formGroupExampleInput5" class="form-label">Tipo</label>
						<select id="formGroupExampleInput5" class="form-select" name="tipo" placeholder="Escolha uma opção..." value = "<?php echo $dados1['tipo']; ?>">
							<option>Vegan</option>
							<option>Carne</option>
							<option>Peixe</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput6" class="form-label">Categoria</label>
						<select id="formGroupExampleInput6" class="form-select" name="categoria"placeholder="Escolha uma opção..." value = "<?php echo $dados1['categoria']; ?>">
							<option>Entradas</option>
							<option>Prato Principal</option>
							<option>Sobremesa</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput7" class="form-label">Ficheiro</label>
						<br><label class="form-label">Ficheiro de imagem: <?php echo $dados1['img']; ?></label>				
						<input type="file" class="form-control" id="formGroupExampleInput7" name="img" value="<?php echo $dados1['img']; ?>">
					</div> 
				</div>
			</div>
			<div class="d-grid gap-2 col-4 mx-auto">    
				<button id="submit" type="submit" class="btn btn-primary">Atualizar Prato</button>
			</div>
		</form>
	</div>
	<?php 
	unset($_GET['edita']);
}

?>