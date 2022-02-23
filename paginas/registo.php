<title>Registo</title>

<div class="container" id="registo">
    <h4>Registo</h4>
    <hr>
    <form id="registo" class="col" action="php/actions/registo.php" id="form" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o seu nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Morada</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a sua morada" name="morada" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o seu código postal" name="cod_postal" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput4" class="form-label">Localidade</label>
                            <input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Insira a sua localidade" name="localidade" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput5" class="form-label">Nº Contribuinte</label>
                    <input type="number" class="form-control" id="formGroupExampleInput5" placeholder="Insira o seu número de contribuinte" name="nif" required>
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
                    <input type="email" class="form-control" id="formGroupExampleInput9" placeholder="Insira o seu nome de utilizador" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput11" class="form-label">Telefone</label>
                    <input type="number" class="form-control" id="formGroupExampleInput11" placeholder="Insira o seu numero de telefone" name="tel" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="formGroupExampleInput7" class="form-label">Nome de Utilizador</label>
                    <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Insira o seu nome de utilizador" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput8" class="form-label">Palavra Passe</label>
                    <input type="password" class="form-control" id="formGroupExampleInput8" placeholder="Insira a sua palavra passe" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput10" class="form-label">Confirme a Palavra Passe</label>
                    <input type="password" class="form-control" id="formGroupExampleInput10" placeholder="Confirme a sua palavra passe" name="password" data-match="#password" data-match-error="As password têm que ser iguais." required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                  <label class="form-check-label" for="flexCheckDefault">Declaro que li e concordo com <a href="termos.php" target="_blank">os termos</a> do site.</label>
              </div>
              <div class="d-grid gap-2 col-4 mx-auto">    
                <button id="submit" type="submit" class="btn btn-primary">Registar</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
