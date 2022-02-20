<div class="container-fluid">
    <form id="edita" class="col-12" action="index.php?page=area_reservada&subpage=user&criar=" method="POST">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nome</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Morada</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a sua morada" name="morada" required>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o seu código postal" name="cod_postal" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput4" class="form-label">Localidade</label>
            <input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Insira a sua localidade" name="localidade" required>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput5" class="form-label">Nº Contribuinte</label>
            <input type="number" class="form-control" id="formGroupExampleInput5" placeholder="Insira o seu número de contribuinte" name="nif"required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput6" class="form-label">Pais</label>
            <select id="formGroupExampleInput6" class="form-select" name="pais"placeholder="Escolha uma opção...">
                <option>Portugal</option>
                <option>Espanha</option>
                <option>França</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput9" class="form-label">Email</label>
            <input type="email" class="form-control" id="formGroupExampleInput9" placeholder="Insira o seu nome de utilizador" name="email" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput11" class="form-label">Papel</label>
            <select id="formGroupExampleInput11" class="form-select" name="role"placeholder="Escolha uma opção...">
                <option>Utilizador</option>
                <option>Administrador</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput7" class="form-label">Nome de Utilizador</label>
            <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Insira o seu nome de utilizador" name="username" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput8" class="form-label">Palavra Passe</label>
            <input type="password" class="form-control" id="formGroupExampleInput8" placeholder="Insira a sua palavra passe" name="password" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput10" class="form-label">Conforme a Palavra Passe</label>
            <input type="password" class="form-control" id="formGroupExampleInput10" placeholder="Confirme a sua palavra passe" name="password" required>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>