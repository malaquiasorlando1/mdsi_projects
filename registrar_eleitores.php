<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

// Cria a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Processa o formulário quando for submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nif = $_POST["nif"];
    $data_nascimento = $_POST["data_nascimento"];
    $num_eleitor = $_POST["num_eleitor"];
    $senha = $_POST["senha"];

    // Verifica se o usuário já fez o cadastro com base no nome, nif ou num_eleitor usando Prepared Statements
    $verifica_sql = "SELECT id FROM eleitores WHERE nome = ? OR nif = ? OR num_eleitor = ?";
    $stmt_verifica = mysqli_prepare($conn, $verifica_sql);

    // Vincular parâmetros e executar a declaração
    mysqli_stmt_bind_param($stmt_verifica, "ss", $nome, $nif);
    mysqli_stmt_execute($stmt_verifica);

    $verifica_result = mysqli_stmt_get_result($stmt_verifica);

    if (mysqli_num_rows($verifica_result) > 0) {
        // Redirecionamento em caso de dados duplicados encontrados
        header("Location: mensagem2.php?tipo=erro");
        exit; // Importante sair após redirecionar
    } else {
        // Insere os dados na tabela usando Prepared Statements
        $sql = "INSERT INTO eleitores (nome, email, nif, data_nascimento, num_eleitor, senha)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt, "ssssss", $nome, $email, $nif, $data_nascimento, $num_eleitor, $senha);
        mysqli_stmt_execute($stmt);

        // Redirecionamento em caso de inserção bem-sucedida
        header("Location: mensagem2.php?tipo=sucesso");
        exit; // Importante sair após redirecionar
    }
}

mysqli_close($conn);
