<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>VOTING</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/votos.css">
  <!-- Favicon  -->
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
    <h2 class="text-center">"Número De Votos Por Candidato"</h2> <br>

    <?php
    $host = "localhost";
    $dbname = "voting";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
      die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    // Consulta SQL para obter o total de votos
    $sqlTotalVotos = "SELECT SUM(numero_votos) AS total_votos FROM votos";
    $stmtTotalVotos = mysqli_prepare($conn, $sqlTotalVotos);

    if ($stmtTotalVotos) {
      mysqli_stmt_execute($stmtTotalVotos);
      $resultTotalVotos = mysqli_stmt_get_result($stmtTotalVotos);

      if ($resultTotalVotos) {
        $rowTotalVotos = mysqli_fetch_assoc($resultTotalVotos);
        $totalVotos = $rowTotalVotos['total_votos'];

        // Exibir o total de votos
        if ($totalVotos === null) {
          $totalVotos = 0;
        }
        echo "<p><strong>Total De Votos:</strong> $totalVotos</p>";
      } else {
        $totalVotos = 0;
        echo "<p><strong>Total De Votos:</strong> $totalVotos</p>";
      }

      mysqli_stmt_close($stmtTotalVotos);
    }

    mysqli_close($conn);
    ?>

    <table class="table">
      <thead>
        <tr>
          <th>Candidatos</th>
          <th>Qtd De Votos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $host = "localhost";
        $dbname = "voting";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$conn) {
          die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        // Consulta SQL para obter os votos por candidato
        $sql = "SELECT nome, numero_votos FROM votos";
        $stmt = mysqli_prepare($conn, $sql);

        // Verifica se a consulta foi preparada corretamente e executa-a
        if ($stmt) {
          mysqli_stmt_execute($stmt);
          $resultado = mysqli_stmt_get_result($stmt);

          // Exibir os resultados na tabela HTML
          if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
              echo "<td>" . htmlspecialchars($row['numero_votos']) . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='2'>Nenhum dado encontrado.</td></tr>";
          }

          mysqli_stmt_close($stmt); // Fecha a declaração preparada
        }

        mysqli_close($conn);
        ?>
      </tbody>
    </table>

  </div> <br><br><br>

  <footer class="footer mt-5">
    <div class="container">
      <span class="text-muted">© 2023 Todos Direitos Reservados Ao "VOTING".</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>