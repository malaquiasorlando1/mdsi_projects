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

if (isset($_POST['entrar'])) {
    $codigo = $_POST['validar'];

    // Consulta para verificar se o código existe na tabela e não foi usado usando Prepared Statements
    $verifica_sql = "SELECT * FROM codigos_validacao WHERE codigo = ? AND usado = 0";
    $stmt_verifica = mysqli_prepare($conn, $verifica_sql);

    // Vincular parâmetros e executar a declaração
    mysqli_stmt_bind_param($stmt_verifica, "s", $codigo);
    mysqli_stmt_execute($stmt_verifica);

    $verifica_result = mysqli_stmt_get_result($stmt_verifica);

    if (mysqli_num_rows($verifica_result) > 0) {
        // Marque o código como usado no banco de dados
        $update_sql = "UPDATE codigos_validacao SET usado = 1 WHERE codigo = ?";
        $stmt_update = mysqli_prepare($conn, $update_sql);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt_update, "s", $codigo);
        mysqli_stmt_execute($stmt_update);

        // Consulta para obter o nome do candidato associado ao código
        $consulta_nome = "SELECT nome_pessoa FROM codigos_validacao WHERE codigo = ?";
        $stmt_nome = mysqli_prepare($conn, $consulta_nome);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt_nome, "s", $codigo);
        mysqli_stmt_execute($stmt_nome);

        $nome_result = mysqli_stmt_get_result($stmt_nome);

        if (mysqli_num_rows($nome_result) > 0) {
            $row = mysqli_fetch_assoc($nome_result);
            $nome_candidato = $row["nome_pessoa"];
            // Redireciona para a página de candidato com o nome do candidato na URL
            header("Location: candidato_votar.php?nome_candidato=$nome_candidato");
            exit();
        } else {
            // Erro ao obter o nome do candidato
            header("Location: mensagem.php?tipo=erro");
            exit();
        }
    } else {
        // Código não encontrado na tabela ou já utilizado
        // Verifica se o código existe na tabela
        $verifica_codigo_sql = "SELECT * FROM codigos_validacao WHERE codigo = ?";
        $stmt_verifica_codigo = mysqli_prepare($conn, $verifica_codigo_sql);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt_verifica_codigo, "s", $codigo);
        mysqli_stmt_execute($stmt_verifica_codigo);

        $verifica_codigo_result = mysqli_stmt_get_result($stmt_verifica_codigo);

        if (mysqli_num_rows($verifica_codigo_result) > 0) {
            // Código encontrado, mas já foi usado
            header("Location: mensagem.php?tipo=codigo_usado");
            exit();
        } else {
            // Código não encontrado na tabela
            header("Location: mensagem.php?tipo=codigo_inexistente");
            exit();
        }
    }
}
