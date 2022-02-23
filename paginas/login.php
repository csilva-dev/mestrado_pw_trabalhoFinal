<title>Area Reservada</title>

<div class="container" id="registo" style="min-height: 59.1vh;">
    <h4>Login</h4>
    <hr>
    <div class="row">
        <div class="col">
            <form class="col-6" method="POST" id="registoForm" action="php/actions/login.php">
                <div class="mb-3">
                    <label for="validationDefaultUsername" class="form-label">Nome de Utilizador</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-control" id="validationDefaultUsername" name="user" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationDefault03" class="form-label">Password</label>
                    <input type="password" class="form-control" id="validationDefault03" name="pass" required>
                </div>
                <div class="col-auto text-center">
                    <div class="d-grid gap-2 col-4 mx-auto" style="margin-bottom: 10px;">    
                        <button id="submit" type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Ainda não tem conta? <a href="index.php?page=registo" style="color: #393f81;">Registe-se aqui!</a></p>
                </div>
            </form>
        </div>
    </div>
</div>