<title>Area Reservada</title>

<div class="container-fluid">
    <form class="row" method="POST" action="php/actions/login.php">
        <div class="col">
            <label for="validationDefaultUsername" class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" id="validationDefaultUsername" name="user" aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="validationDefault03" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationDefault03" name="pass" required>
            </div>
        </div>
        <div class="row">
            <div class="form-check col">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Agree to terms and conditions
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a class="small text-muted" href="#!">Forgot password?</a>
                <p class="mb-5 pb-lg-2" style="color: #393f81;">Ainda não tem conta? <a href="index.php?page=registo" style="color: #393f81;">Registe-se aqui!</a></p>
            </div>
        </div>
    </form>
</div>