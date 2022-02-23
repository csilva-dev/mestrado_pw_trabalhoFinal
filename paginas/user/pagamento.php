<?php 

include ('php/bd/ligaBD.php');
$total = 0;
$uuid = $_SESSION['user_uuid'];

$query = "SELECT bin_to_uuid(uuid) as uuid, nome, morada, cod_postal, localidade, nif, pais, email, tel, role, username, password, data_registo
FROM projetoWEB.cliente WHERE uuid = uuid_to_bin('$uuid')";

$resultado = mysqli_query($liga, $query);

$dados = mysqli_fetch_assoc($resultado);

$nome = $dados['nome'];
$nif = $dados['nif'];
$tel = $dados['tel'];

?>

<title>Pagamento</title>

<div class="container" style="margin-bottom: 20px">
	<div class="row">
		<div class="col">
			<div class="row">
				<h4>Carrinho de Compras</h4>
			</div>
		</div>
	</div>
	<hr>
	<form action="index.php?page=area_reservada&subpage=checkout_final" method="POST">
		<div class="row">
			<div class="col">
				<h6>Confirme os seus dados</h6>
				<hr>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nome</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome" value="nome" required>
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput2" class="form-label">Nº Contribuinte</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira o seu nif" name="nif" value="nif">
				</div>

				<div class="mb-3">
					<label for="formGroupExampleInput3" class="form-label">Contato Telefónico</label>
					<input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Insira o seu telefone" name="tel" value="tel" required>
				</div>
			</div>
			<div class="col">
				<h6>Dados da encomenda</h6>
				<hr>
				<table id="customers" class="table table-striped">        
					<thead>
						<tr>
							<th width="350">Prato</th>
							<th width="100">Quantidade</th>
							<th width="100">Preço</th>
							<th width="100">Subtotal</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach($_SESSION['carrinho'] as $uuid => $qtd){
							$query = "SELECT bin_to_uuid(uuid) as uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria FROM projetoWEB.prato WHERE uuid = uuid_to_bin('$uuid')";
							$sql = mysqli_query($liga,$query) or die(mysqli_error($liga));       
							$dados = mysqli_fetch_assoc($sql);  

							$nome   = $dados['nome'];
							$p = floatval($dados['preco']);
							$preco = number_format($p,2,'.','');
							$s = (floatval($preco))*(floatval($qtd));
							$sub = number_format($s,2,'.','');                              

							$total+=$s;   
							$t=number_format($total,2,'.','');

							?>
							<tr>
								<td><?php echo $nome; ?></td>
								<td><?php echo $qtd; ?></td>
								<td><?php echo $preco; ?> €</td>
								<td><?php echo $sub; ?> €</td>
							</tr>                    
							<?php
						}
						?> 
						<tfoot>
							<td colspan="3" style="text-align: right;font-weight: bold;">Total: </td>
							<td style="font-weight: bold;"><?php echo $t; ?> €</td>
						</tfoot>
					</tbody>

				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h6>Método de Pagamento</h6>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="forma_pagamento" id="exampleRadios1" value="Ato de Entrega" checked>
					<label class="form-check-label" for="exampleRadios1">
						Ato de Entrega
					</label>
					<i class="bi bi-geo-alt"></i>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="forma_pagamento" id="exampleRadios2" value="Multibanco">
					<label class="form-check-label" for="exampleRadios2">
						Multibanco
					</label>
					<img src="img/mb.svg" height="20px" width="">
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="forma_pagamento" id="exampleRadios3" value="MBWay">
					<label class="form-check-label" for="exampleRadios3">
						MBWay
					</label>
					<img src="img/mbway.svg" height="20px" width="">
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="forma_pagamento" id="exampleRadios4" value="Paypal">
					<label class="form-check-label" for="exampleRadios4">
						Paypal
					</label>
					<img src="img/pp.svg" height="20px" width="">
				</div>
			</div>
		</div>
		<center><button id="submit" type="submit" class="btn btn-primary">Finalizar Encomenda</button></center>
	</form>
</div>