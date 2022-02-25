<title>Pratos</title>

<?php 

include ('php/bd/ligaBD.php');

$query = "SELECT bin_to_uuid(uuid) as uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria FROM projetoWEB.prato;";

$resultado = mysqli_query($liga, $query);

$nr_registos = mysqli_num_rows($resultado);

$img = "";

if ($nr_registos > 0) {
	?>
	
	<div class="container" style="min-height: 54vh;">
		<div class="row">
			<div class="col">
				<div class="row">
					<h4>Lista de Pratos</h4>
				</div>
				<div class="row">
					<h7>Existem <?php echo $nr_registos ?> pratos registados</h7>
				</div>
			</div>
		</div>
		
		<hr>
		<div class="row row-cols-1 row-cols-md-4 g-4">
			<?php
			while ($dados = mysqli_fetch_assoc($resultado)) {				
				if ($dados['img'] === null || empty(trim($dados['img']))) {
					$img = 'img/sem_img.png';
				} else {
					$img = "img/".$dados['img'];
				}
				?>
				<div class="col">
					<div class="card" id="cards" style="width: 18rem;">
						<img src="<?php echo $img; ?>" class="card-img-top" alt="..." style="height: 18rem;object-fit: cover;">
						<div class="card-body">
							<h5><?php echo $dados['nome']; ?></h5>
							<p class="card-text"><?php echo $dados['descricao']; ?></p>
							<h6>€ <?php echo $dados['preco']; ?></h6>
							<b>#<?php echo $dados['tipo']; ?> #<?php echo $dados['categoria']; ?></b><br>
							<a class="card-link" href="index.php?page=area_reservada&subpage=prato&edita=<?php echo $dados['uuid']; ?>" class="stretched-link">Editar</a>&nbsp;&nbsp;
							<a class="card-link" href="index.php?page=area_reservada&subpage=prato&apaga=<?php echo $dados['uuid']; ?>" class="stretched-link">Apagar</a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
} else {
	echo "<h3>Sem dados!</h3>";
}


?>
