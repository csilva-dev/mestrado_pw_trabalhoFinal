<title>Reservas</title>


<div class="container" style="min-height: 50.8vh;">
	<div class="row">		
		<h4>Reservas de Mesas</h4>		
	</div>
	<hr>
	<div class="row">
		<div class="col">
			<form class="" action="index.php?page=area_reservada&subpage=reservas_registo" method="POST" style="margin-bottom: 20px">
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Data</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="AAAA-MM-DD" name="data" required>
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput2" class="form-label">Periodo</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="HH:MM" name="periodo" required>
				</div>

				<div class="mb-3">
					<label for="formGroupExampleInput3" class="form-label">Nº de Pessoas</label>
					<input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o número de pessoas" name="pessoas" required>
				</div>
				<br>
				<button id="submit" type="submit" class="btn btn-primary">Registar Reserva</button>
			</form>
		</div>
		<div class="col">
			<img src="">
		</div>
	</div>
</div>

