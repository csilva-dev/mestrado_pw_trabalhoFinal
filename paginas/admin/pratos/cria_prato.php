
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <h4>Registo de Novo Prato</h4>
            </div>
        </div>
    </div>
    <hr>
    <form id="edita" action="index.php?page=area_reservada&subpage=prato&criar=" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Insira o nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Insira a descrição" name="descricao" required>
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">Preço (€)</label>
                    <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Insira o preço" name="preco" required>
                </div>
                <div class="mb-3">
                    <input type="checkbox" class="form-check-input" id="formGroupExampleInput4" name="disponivel_take">
                    <label for="formGroupExampleInput4" class="form-check-label">Disponivel Take-Away</label>
                </div>
                <div class="mb-3">
                    <input type="checkbox" class="form-check-input" id="formGroupExampleInput8" name="destaque">
                    <label for="formGroupExampleInput8" class="form-check-label">Aparece nos Destaques</label>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="formGroupExampleInput5" class="form-label">Tipo</label>
                    <select id="formGroupExampleInput5" class="form-select" name="tipo" placeholder="Escolha uma opção...">
                        <option>Vegan</option>
                        <option>Carne</option>
                        <option>Peixe</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput6" class="form-label">Categoria</label>
                    <select id="formGroupExampleInput6" class="form-select" name="categoria"placeholder="Escolha uma opção...">
                        <option>Entradas</option>
                        <option>Prato Principal</option>
                        <option>Sobremesa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput7" class="form-label">Ficheiro</label>
                    <input type="file" class="form-control" id="formGroupExampleInput7" name="img">
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">    
            <button id="submit" type="submit" class="btn btn-primary">Criar Prato</button>
        </div>
    </form>
</div>