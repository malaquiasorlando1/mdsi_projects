<?php
session_start(); // Inicie a sessão no topo do seu arquivo PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Obtém os dados do formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Consulta para verificar se o usuário é um administrador usando Prepared Statements
    $verifica_sql = "SELECT usuario FROM administrador WHERE usuario = ? AND senha = ?";
    $stmt = mysqli_prepare($conn, $verifica_sql);

    // Vincular parâmetros e executar a declaração
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);
    mysqli_stmt_execute($stmt);

    $verifica_result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($verifica_result) > 0) {
        // Busca o nome do administrador
        $row = mysqli_fetch_assoc($verifica_result);
        $nomeAdmin = $row['usuario'];

        // Armazena o nome do administrador na sessão
        $_SESSION['admin_nome'] = $nomeAdmin;

        // Redireciona para a página de sucesso após o login
        header("Location: index1.php");
        exit; // Importante sair após redirecionar
    }
}

// Usuário ou senha inválidos, redireciona para a página de erro
header("Location: mensagem1.php?tipo=erro");
exit; // Importante sair após redirecionar
