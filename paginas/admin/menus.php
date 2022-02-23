<title>Categorias</title>

<div class="container">
	<br><br>
	<div class="row">
		<div class="col-md-4">
			<h3>Adicionar nova Categoria</h3>

			<form action="../../php/actions/categoria/insert.php" id="form">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input class="form-control" type="text" name="nome">
				</div>
				<button type="button" class="btn btn-primary" id="btnSubmit">Criar</button>
			</form>
		</div>

		<div class="col-md-8">
			<h3>Categorias</h3>
			<div id="lista-categorias"></div>
		</div>
	</div>
</div>

<!-- The Modal -->
<div class="modal" id="editar-categoria">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Editar Categoria</h4>
				<button type="button" class="btn-close" data-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="../../php/actions/categoria/update.php" id="edit-form">
					<input class="form-control" type="hidden" name="uuid">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input class="form-control" type="text" name="nome">
					</div>
					<button type="button" class="btn btn-primary" id="btnUpdateSubmit">Atualizar</button>
					<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Fechar</button>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Must put our javascript files here to fast the page loading -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Sweetalert2 JS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Page Script -->
<script src="../../js/categoria.js"></script>