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
  <link rel="stylesheet" href="assets/css/cadastro.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/icon.ico">
</head>

<body>
  <form action="registrar_eleitores.php" method="post">
    <div class="container"> <br>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-header">
              <h3 class="text-center">Cadastro</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nome">Nome (Primeiro E Último) <span class="required"></span></label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite Seu Nome" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Digite Seu Email">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nif">NIF <span class="required"></span></label>
                    <input type="text" class="form-control" id="nif" name="nif" placeholder="Digite Seu NIF" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="data_nascimento">Data De Nascimento <span class="required"></span></label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    <span id="idadeNaoPermitida" style="display:none; color:red;">Idade Não Permitida</span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="num_eleitor">Cartão De Eleitor Nº <span class="required"></span></label>
                    <input type="text" class="form-control" id="num_eleitor" name="num_eleitor" placeholder="Digite O Número" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="senha">Senha <span class="required"></span></label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua Senha" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="password-toggle">
                          <i class="far fa-eye" id="eyeIcon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-sm">Cadastrar</button>
              </form> <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- -->

  <script src="assets/js/script.js"></script>
</body>

</html>