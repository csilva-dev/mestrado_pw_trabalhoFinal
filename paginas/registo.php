<title>Registo</title>

<form id="registo">
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Nome</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome">
</div>
<div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Morada</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a sua morada" name="morada">
</div>

<div class="mb-3">
    <label for="formGroupExampleInput3" class="form-label">Código Postal</label>
    <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Insira o seu código postal" name="cod_postal">
</div>
<div class="mb-3">
    <label for="formGroupExampleInput4" class="form-label">Localidade</label>
    <input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Insira a sua localidade" name="localidade">
</div>

<div class="mb-3">
    <label for="formGroupExampleInput5" class="form-label">Nº Contribuinte</label>
    <input type="text" class="form-control" id="formGroupExampleInput5" placeholder="Insira o seu número de contribuinte" name="nif">
</div>
<div class="mb-3">
    <label for="formGroupExampleInput6" class="form-label">Pais</label>
    <select id="formGroupExampleInput6" class="form-select" name="pais">
      <option selected>Escolha...</option>
      <option>Portugal</option>
      <option>Espanha</option>
      <option>França</option>
  </select>
</div>
<div class="mb-3">
    <label for="formGroupExampleInput9" class="form-label">Email</label>
    <input type="email" class="form-control" id="formGroupExampleInput9" placeholder="Insira o seu nome de utilizador" name="email">
</div>
<div class="mb-3">
    <label for="formGroupExampleInput7" class="form-label">Nome de Utilizador</label>
    <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Insira o seu nome de utilizador" name="username">
</div>
<div class="mb-3">
    <label for="formGroupExampleInput8" class="form-label">Palavra Passe</label>
    <input type="password" class="form-control" id="formGroupExampleInput8" placeholder="Insira a sua palavra passe" name="password">
</div>
<button id="submit" type="submit" class="btn btn-primary">Enviar</button>
</form>

<script>
    $(document).ready(function() {

        $("#registo").submit(function(event) {
            event.preventDefault();

            /* Get from elements values */
            var values = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "php/actions/createCliente.php",
                data: values,
                success: function(response){
                    alert(response);
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
    });

</script>