<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>VOTING</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/validac.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/icon.ico">
</head>

<body>
  <form action="validar_codigo.php" method="post" enctype="multipart/form-data" id="student-form">
    <div class="container"> <br><br><br><br>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-header">
              <h3 class="text-center">Validação</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="senha"></label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="validar" name="validar" placeholder="Insire O Seu Código" required>
                    <div class="input-group-append">
                      <span class="input-group-text" id="password-toggle">
                        <i class="far fa-eye-slash" id="eyeIcon"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group text-center">
                  <button type="submit" id="entrar" name="entrar" class="btn btn-primary">Entrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="assets/js/script5.js"></script>
</body>

</html>