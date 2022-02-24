<?php 

include ('php/bd/ligaBD.php');


$query = "SELECT bin_to_uuid(uuid) as uuid, max_mesas, max_take_away FROM projetoWEB.config";

$resultado = mysqli_query($liga, $query);
if ($resultado === false) {
	die(mysqli_error());
}
$dados1 = mysqli_fetch_assoc($resultado);
?>
<div class="container" style="min-height: 54vh;">
	<div class="row">
		<div class="col">
			<div class="row">
				<h4>Configurações de reservas e encomendas</h4>
			</div>
		</div>
	</div>
	<hr>
	<form id="edita" action="index.php?page=area_reservada&subpage=config&editar=<?php echo $dados1['uuid']; ?>" method="POST">
		<div class="row">
			<div class="col">
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Máximo Número de Mesas Disponiveis para Reserva</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o nome" name="max_mesas" value="<?php echo $dados1['max_mesas']; ?>" required>
				</div>
			</div>
			<div class="col">						
				<div class="mb-3">
					<label for="formGroupExampleInput2" class="form-label">Máximo Número de Encomendas Take-Away</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a descrição" name="max_take_away" value="<?php echo $dados1['max_take_away']; ?>" required>
				</div>
			</div>
		</div>
			<div class="d-grid gap-2 col-4 mx-auto">    
            <button id="submit" type="submit" class="btn btn-primary">Atualizar Configurações</button>
        </div>
	</form>		
</div>
<?php 
unset($_GET['edita']);

?>