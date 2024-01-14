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
  <link rel="stylesheet" href="assets/css/editar_eleitor.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/icon.ico">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index1.php">
      <img src="assets/img/ballot_96px.png" alt="Ícone Voting" width="30" height="30" class="d-inline-block align-top" style="margin-right: 5px;">VOTING</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="votos.php">Votos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="eleitores.php">Eleitores</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto align-items-center">
        <?php
        // Inicie a sessão no topo do seu arquivo PHP
        session_start();

        // Verifique se o nome do administrador está na sessão
        if (isset($_SESSION['admin_nome'])) {
          $nomeAdmin = $_SESSION['admin_nome'];

          echo "<li class='nav-item'>";
          echo "<a class='nav-link'>$nomeAdmin</a>";
          echo "</li>";

          echo "<li class='nav-item ml-3'>";
          echo "<a class='nav-link' href='index.php'>";
          echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>";
          echo "<path fill-rule='evenodd' d='M12.5 12.5a.5.5 0 0 1-.5.5H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-9a.5.5 0 0 1-.5-.5V8.707a.5.5 0 0 1 .146-.354l2.5-2.5a.5.5 0 0 1 .708 0l.647.646a.5.5 0 0 1 0 .708l-1.793 1.793H10.5a.5.5 0 0 0 0-1H5.354l1.793 1.793a.5.5 0 0 1 0 .708l-.647.647a.5.5 0 0 1-.708 0l-2.5-2.5a.5.5 0 0 1-.146-.353V3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v9z'/>";
          echo "</svg>";
          echo "Sair";
          echo "</a>";
          echo "</li>";
        } else {
          // Se o administrador não estiver logado, exiba o link de saída
          echo '<li class="nav-item ml-auto">';
          echo '<a class="nav-link" href="index.php">Sair</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </div>
  </nav> <br>

  <div class="container">
    <h2 class="text-center">"Editar Eleitor"</h2> <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "voting";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Falha na conexão: " . mysqli_connect_error());
    }

    if (isset($_GET['id'])) {
      $eleitor_id = $_GET['id'];

      // Consulta usando Prepared Statement
      $consulta_sql = "SELECT * FROM eleitores WHERE id = ?";
      $stmt = mysqli_prepare($conn, $consulta_sql);

      // Vincular parâmetros e executar a declaração
      mysqli_stmt_bind_param($stmt, "i", $eleitor_id);
      mysqli_stmt_execute($stmt);
      $resultado = mysqli_stmt_get_result($stmt);

      if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
    ?>
        <form method="post" action="actualizar_eleitor.php">
          <input type="hidden" name="eleitor_id" value="<?php echo $row['id']; ?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nif">NIF:</label>
                <input type="text" class="form-control" id="nif" name="nif" value="<?php echo $row['nif']; ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="data_nascimento">Data De Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $row['data_nascimento']; ?>" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="num_eleitor">Número De Eleitor:</label>
                <input type="text" class="form-control" id="num_eleitor" name="num_eleitor" value="<?php echo $row['num_eleitor']; ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="senha">Senha:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $row['senha']; ?>" required>
                  <div class="input-group-append">
                    <span class="input-group-text" id="password-toggle">
                      <i class="far fa-eye-slash" id="eyeIcon"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div> <br>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
    <?php
      } else {
        echo "Eleitor não encontrado.";
      }
    } else {
      echo "ID do eleitor não especificado.";
    }
    ?>
  </div> <br><br><br>

  <footer class="footer mt-5">
    <div class="container">
      <span class="text-muted">© 2023 Todos Direitos Reservados Ao "VOTING".</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="assets/js/script1.js"></script>
</body>

</html>