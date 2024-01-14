<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>VOTING</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/eleitor_votar.css">
  <!-- Favicon  -->
  <link rel="icon" href="assets/img/icon.ico">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="eleitor_votar.php">
      <img src="assets/img/ballot_96px.png" alt="Ícone Voting" width="30" height="30" class="d-inline-block align-top" style="margin-right: 5px;">VOTING</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item ml-auto">
          <?php
          if (isset($_GET['nome_eleitor'])) {
            $nome_eleitor = $_GET['nome_eleitor'];
            echo "<li class='nav-item'><a class='nav-link'>$nome_eleitor</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link'>Eleitor Não Autenticado</a></li>";
          }
          ?>
        <li class="nav-item ml-3">
          <a class="nav-link" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12.5 12.5a.5.5 0 0 1-.5.5H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-9a.5.5 0 0 1-.5-.5V8.707a.5.5 0 0 1 .146-.354l2.5-2.5a.5.5 0 0 1 .708 0l.647.646a.5.5 0 0 1 0 .708l-1.793 1.793H10.5a.5.5 0 0 0 0-1H5.354l1.793 1.793a.5.5 0 0 1 0 .708l-.647.647a.5.5 0 0 1-.708 0l-2.5-2.5a.5.5 0 0 1-.146-.353V3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v9z" />
            </svg>
            Sair
          </a>
        </li>
      </ul>
    </div>
  </nav> <br>

  <div class="container">
    <h2 class="text-center">"CANDIDATOS"</h2> <br>
    <div class="row">
      <!-- Candidato 1 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/img/mpla.jpg" class="card-img-top" alt="Foto do Candidato 1">
          <div class="card-body">
            <h5 class="card-title">1 - MPLA "Movimento Popular De Libertação De Angola"</h5>
            <h5 class="card-title">João Lourenço</h5>
            <p class="card-text">"Juntos, Podemos Criar Mudanças Significativas! Conte Comigo Para Representar
              Seus Interesses E Tornar Nossa Comunidade Um Lugar Melhor. Vote Em Mim Para Fazer A Diferença Que
              Você Deseja Ver."</p>
            <div class="text-center">
              <form action="registrar_votos.php" method="POST">
                <input type="hidden" name="nome_candidato" value="João Lourenço">
                <button type="submit" class="btn btn-primary" name="votar">Votar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Candidato 2 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/img/unita.webp" class="card-img-top" alt="Foto do Candidato 2">
          <div class="card-body">
            <h5 class="card-title">2 - UNITA "União Nacional Para À Independência Total De Angola"</h5>
            <h5 class="card-title">Adalberto Costa Júnior</h5>
            <p class="card-text">"Acredito No Poder Da União E Na Força De Nossas Ideias Para Construir
              Um Futuro Promissor. Seja Parte Dessa Transformação! Seu Voto É A Chave Para Alcançarmos Nossos
              Objetivos Comuns."</p>
            <div class="text-center">
              <form action="registrar_votos.php" method="POST">
                <input type="hidden" name="nome_candidato" value="Adalberto Costa Júnior">
                <button type="submit" class="btn btn-primary" name="votar">Votar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Candidato 3 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/img/fnla.jpeg" class="card-img-top" alt="Foto do Candidato 3">
          <div class="card-body">
            <h5 class="card-title">3 - FNLA "Frente Nacional De Libertação De Angola"</h5>
            <h5 class="card-title">Nimi A Simbi</h5>
            <p class="card-text">"Comprometo-Me A Ouvir Suas Preocupações, Defender Suas Necessidades E Agir
              Com Integridade E Dedicação. Sua Confiança É Fundamental Para Construirmos Juntos Um Amanhã Mais
              Próspero. Vote Em Mim Para Representá-Lo Com Excelência."</p>
            <div class="text-center">
              <form action="registrar_votos.php" method="POST">
                <input type="hidden" name="nome_candidato" value="Nimi A Simbi">
                <button type="submit" class="btn btn-primary" name="votar">Votar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Candidato 4 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/img/prs.jpeg" class="card-img-top" alt="Foto do Candidato 4">
          <div class="card-body">
            <h5 class="card-title">4 - PRS "Partido De Renovação Social"</h5>
            <h5 class="card-title">Benedito Daniel</h5>
            <p class="card-text">"Cada Voto Conta! Seja Parte Activa Na Construção De Uma Sociedade Mais Justa
              E Inclusiva. Sua Voz Importa, E Estou Aqui Para Ser Seu Porta-Voz. Vote Em Mim Para Ser A Voz Da
              Mudança Que Desejamos."</p>
            <div class="text-center">
              <form action="registrar_votos.php" method="POST">
                <input type="hidden" name="nome_candidato" value="Benedito Daniel">
                <button type="submit" class="btn btn-primary" name="votar">Votar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Candidato 5 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/img/pha.jpg" class="card-img-top" alt="Foto do Candidato 5">
          <div class="card-body">
            <h5 class="card-title">5 - PHA "Partido Humanista De Angola"</h5>
            <h5 class="card-title">Florbela Malaquias</h5>
            <p class="card-text">"A Força Da Mudança Começa Com Cada Um De Nós. Juntos, Podemos Alcançar Grandes
              Conquistas Para Nossa Comunidade. Seu Voto É A Ferramenta Para Construirmos Um Futuro Melhor.
              Conte Comigo, Vote Com Esperança E Confiança!"</p>
            <div class="text-center">
              <form action="registrar_votos.php" method="POST">
                <input type="hidden" name="nome_candidato" value="Florbela Malaquias">
                <button type="submit" class="btn btn-primary" name="votar">Votar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  </div> <br><br><br>

  <footer class="footer mt-5">
    <div class="container">
      <span class="text-muted">© 2023 Todos Direitos Reservados Ao "VOTING".</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>