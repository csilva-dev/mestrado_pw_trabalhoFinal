<title>Histórico</title>

<?php 

include 'php/bd/ligaBD.php';

$user_uuid = $_SESSION['user_uuid'];

$query = "SELECT bin_to_uuid(uuid) as uuid, `data`, cliente_uuid, modo_pag, num, valor FROM projetoWEB.take_away where cliente_uuid = UUID_TO_BIN('$user_uuid') order by num desc";

$resultado = mysqli_query($liga, $query);
$nr_registos = mysqli_num_rows($resultado);

$query3 = "SELECT bin_to_uuid(uuid) as uuid, `data`, periodo, pessoas, cliente_uuid, num FROM projetoWEB.reservas where cliente_uuid = UUID_TO_BIN('$user_uuid') order by num desc";
$resultado3 = mysqli_query($liga, $query3);
$nr_registos3 = mysqli_num_rows($resultado3);

$id_acord = "a";
$id_acord2 = "b";
?>
<div class="container" style="margin-bottom: 20px; min-height: 46.7vh;">
	<div class="row">		
		<h4>Histórico de Encomedas e Reservas</h4>		
	</div>
	<div class="row">
		<h7>Existem <?php echo $nr_registos ?> encomendas e <?php echo $nr_registos3 ?> reservas</h7>
	</div>
	<hr>
	<div class="row">
		<div class="col">
			<div class="accordion" id="accordionExample">
				<?php
				while ($dados = mysqli_fetch_assoc($resultado)) {
					?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id_acord ?>" aria-expanded="true" aria-controls="<?php echo $id_acord ?>">
								Encomenda Nº <?php echo $dados['num']; ?>
							</button>
						</h2>
						<div id="<?php echo $id_acord ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="row">
									<div class="col">
										<h5>Data</h5>
									</div>
									<div class="col">
										<h5><?php echo date('Y-m-d', strtotime($dados['data'])); ?></h5>
									</div>
								</div>
								<hr>
								<?php
								$ta_uuid = $dados['uuid'];
								$query1 = "SELECT bin_to_uuid(uuid) as uuid, bin_to_uuid(prato_uuid) as prato_uuid, qtt, take_away_uuid FROM projetoWEB.take_away_linhas where take_away_uuid = UUID_TO_BIN('$ta_uuid')";
								$resultado1 = mysqli_query($liga, $query1);

								while ($linhas = mysqli_fetch_assoc($resultado1)) {
									$prato_uuid = $linhas['prato_uuid'];
									$query2 = "SELECT nome, descricao, tipo, categoria FROM projetoWEB.prato WHERE uuid = UUID_TO_BIN('$prato_uuid')";

									$resultado2 = mysqli_query($liga, $query2);
									$prato = mysqli_fetch_assoc($resultado2);
									?>

									<div class="row">
										<div class="col-12">
											<h5><?php echo $prato['nome'] ?></h5>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h7>Quantidade</h7>											
										</div>
										<div class="col">
											<h7><?php echo $linhas['qtt']; ?></h7>											
										</div>
									</div>
									<hr>
									<?php
								}
								?>
								<div class="row">
									<div class="col">
										<h7>Modo de Pagamento</h7>
									</div>
									<div class="col">
										<h7><?php echo $dados['modo_pag']; ?></h7>								
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col">
										<h7>Valor</h7>
									</div>
									<div class="col">
										<h5 style="color: #00203F;">€ <?php echo $dados['valor']; ?></h5>
									</div>
								</div>
								<hr>
								<div class="row">
									<form action="php/pdf/invoice.php?uuid=<?php echo $ta_uuid ?>" method="POST" target="_blank">
										<button class="btn btn-primary">Ver Fatura</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php
					$id_acord = $id_acord ."a";
				}
				?>
			</div>
		</div>
		<div class="col">
			<div class="accordion" id="accordionExample2">
				<?php 

				while ($lines = mysqli_fetch_assoc($resultado3)) {
					?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id_acord2 ?>" aria-expanded="true" aria-controls="<?php echo $id_acord2 ?>">
								Reserva Nº <?php echo $lines['num']; ?>
							</button>
						</h2>
						<div id="<?php echo $id_acord2 ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
							<div class="accordion-body">
								<div class="row">
									<div class="col">
										<h5>Data</h5>
										<h7>Horário</h7><br>
										<h7>Pessoas</h7>
									</div>
									<div class="col">
										<h5><?php echo $lines['data']; ?></h5>
										<h7><?php echo date('H:i', strtotime($lines['periodo'])); ?></h7><br>
										<h7><?php echo $lines['pessoas']; ?></h7>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$id_acord2 = $id_acord2 ."b";
				}
				?>
			</div>
		</div>
	</div>
</div>
