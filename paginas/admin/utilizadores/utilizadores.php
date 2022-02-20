<title>Utilizadores</title>

<?php 

include ('php/bd/ligaBD.php');

$query = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, `role`, username, password, data_registo FROM projetoWEB.cliente";

$resultado = mysqli_query($liga, $query);

if (mysqli_num_rows($resultado) > 0) {

	?>
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
			<th>Pass</th>
			<th>Data Registo</th>
			<th>Ações</th>
		</thead>
		<?php
		while ($dados = mysqli_fetch_assoc($resultado)) {
			?>
			<tr>
				<td><?php echo $dados['uuid']; ?></td>
				<td><?php echo $dados['nome']; ?></td>
				<td><?php echo $dados['morada']; ?></td>
				<td><?php echo $dados['cod_postal']; ?></td>
				<td><?php echo $dados['localidade']; ?></td>
				<td><?php echo $dados['nif']; ?></td>
				<td><?php echo $dados['pais']; ?></td>
				<td><?php echo $dados['email']; ?></td>
				<td><?php echo $dados['role']; ?></td>
				<td><?php echo $dados['username']; ?></td>
				<td><?php echo $dados['password']; ?></td>
				<td><?php echo $dados['data_registo']; ?></td>
				<td><a href="index.php?page=area_reservada&subpage=user&edita=<?php echo $dados['uuid'];?>"><i class="bi bi-pencil"></i></a>&nbsp;&nbsp;<a href="index.php?page=area_reservada&subpage=user&apaga=<?php echo $dados['uuid']; ?>"><i class="bi bi-trash" aria-hidden="true"></i></a></td>
			</tr>
			<?php 	
		} 	
		?>
	</table>

	<?php

} else {
	echo "Não existem dados na base de dados!";
}

?>