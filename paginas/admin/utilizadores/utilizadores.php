<title>Utilizadores</title>

<?php 

include ('php/bd/ligaBD.php');

$query = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, `role`, username, password, data_registo FROM projetoWEB.cliente order by data_registo desc";

$resultado = mysqli_query($liga, $query);
$nr_registos = mysqli_num_rows($resultado);

if ($nr_registos > 0) {

	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row">
					<h4>Lista de Utilizadores</h4>
				</div>
				<div class="row">
					<h7>Existem <?php echo $nr_registos ?> utilizadores registados</h7>
				</div>
			</div>
		</div>
		<hr>
		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>Morada</th>
				<th>CP</th>
				<th>Localidade</th>
				<th>NIF</th>
				<th>Pais</th>
				<th>Email</th>
				<th>Role</th>
				<th>Username</th>
				<th>Data Registo</th>
				<th>Ações</th>
			</thead>
			<?php
			$index = 1;
			while ($dados = mysqli_fetch_assoc($resultado)) {
				?>
				<tr>
					<td><?php echo $index; ?></td>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['morada']; ?></td>
					<td><?php echo $dados['cod_postal']; ?></td>
					<td><?php echo $dados['localidade']; ?></td>
					<td><?php echo $dados['nif']; ?></td>
					<td><?php echo $dados['pais']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['role']; ?></td>
					<td><?php echo $dados['username']; ?></td>
					<td><?php echo $dados['data_registo']; ?></td>
					<td><a href="index.php?page=area_reservada&subpage=user&edita=<?php echo $dados['uuid'];?>"><i class="bi bi-pencil"></i></a>&nbsp;&nbsp;<a href="index.php?page=area_reservada&subpage=user&apaga=<?php echo $dados['uuid']; ?>"><i class="bi bi-trash" aria-hidden="true"></i></a></td>
				</tr>
				<?php
				$index++;
			} 	
			?>
		</table>
	</div>

	<?php

} else {
	echo "Não existem dados na base de dados!";
}

?>