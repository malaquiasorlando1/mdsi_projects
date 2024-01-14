<?php
$host = 'localhost';
$dbname = 'voting';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome_candidato'])) {
        $nomeCandidato = $_POST['nome_candidato'];

        // Verifica se o candidato já possui um voto registrado usando Prepared Statements
        $checkIfExists = "SELECT * FROM votos WHERE nome = ?";
        $stmt_check = mysqli_prepare($conn, $checkIfExists);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt_check, "s", $nomeCandidato);
        mysqli_stmt_execute($stmt_check);

        $checkResult = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($checkResult) > 0) {
            // Se o candidato já existe na tabela de votos, atualiza o número de votos
            $updateVotes = "UPDATE votos SET numero_votos = numero_votos + 1 WHERE nome = ?";
            $stmt_update = mysqli_prepare($conn, $updateVotes);

            // Vincular parâmetros e executar a declaração
            mysqli_stmt_bind_param($stmt_update, "s", $nomeCandidato);
            mysqli_stmt_execute($stmt_update);
        } else {
            // Se o candidato não existe na tabela, insere um novo registro de voto usando Prepared Statements
            $insertVote = "INSERT INTO votos (nome, numero_votos) VALUES (?, 1)";
            $stmt_insert = mysqli_prepare($conn, $insertVote);

            // Vincular parâmetros e executar a declaração
            mysqli_stmt_bind_param($stmt_insert, "s", $nomeCandidato);
            mysqli_stmt_execute($stmt_insert);
        }

        // Redireciona para a página inicial após o voto ser registrado
        header("Location: mensagem4.php?tipo=sucesso");
        exit();
    }
}

mysqli_close($conn);
?>
