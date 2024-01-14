<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>VOTING</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/logn.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/icon.ico">
</head>

<body>
  <form action="processar_login.php" method="post">
    <div class="container"> <br><br>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-header">
              <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="nif">NIF</label>
                  <input type="text" class="form-control" id="nif" name="nif" placeholder="Digite Seu NIF" required>
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua Senha" required>
                    <div class="input-group-append">
                      <span class="input-group-text" id="password-toggle">
                        <i class="far fa-eye" id="eyeIcon"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-sm">Entrar</button>
              </form>
              <div class="mt-3 text-center">
                <p>Não Tem Uma Conta? <a href="cadastro.php">Cadastre-Se</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- -->

  <script src="assets/js/script3.js"></script>
</body>

</html>