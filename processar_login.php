<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

// Função para verificar o login do usuário e retornar o nome do eleitor
function verificarLogin($conn, $nif, $senha)
{
    $verifica_sql = "SELECT * FROM eleitores WHERE nif = ? AND senha = ?";
    $stmt = mysqli_prepare($conn, $verifica_sql);

    mysqli_stmt_bind_param($stmt, "ss", $nif, $senha);
    mysqli_stmt_execute($stmt);

    $verifica_result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($verifica_result) > 0) {
        $row = mysqli_fetch_assoc($verifica_result);
        if ($row['logged_in'] == 1) {
            // Usuário já está logado
            header("Location: mensagem3.php?tipo=ja_logado");
            exit;
        } else {
            // O usuário não está logado, então atualize e redirecione usando Prepared Statements
            $update_sql = "UPDATE eleitores SET logged_in = 1 WHERE nif = ?";
            $stmt_update = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($stmt_update, "s", $nif);
            mysqli_stmt_execute($stmt_update);

            mysqli_stmt_close($stmt); // Fecha a declaração preparada $stmt
            mysqli_stmt_close($stmt_update); // Fecha a declaração preparada $stmt_update

            return $row['nome']; // Retorna o nome do eleitor para ser usado após o login
        }
    } else {
        // Credenciais inválidas
        header("Location: mensagem3.php?tipo=erro");
        exit;
    }
}

// Cria a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado para login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif = $_POST["nif"];
    $senha = $_POST["senha"];

    // Chama a função de verificação do login do usuário
    $nomeEleitor = verificarLogin($conn, $nif, $senha);

    // Redireciona para a página eleitor_votar.php com o nome do eleitor na URL após o login
    header("Location: eleitor_votar.php?nome_eleitor=" . urlencode($nomeEleitor));
    exit;
}

mysqli_close($conn);
