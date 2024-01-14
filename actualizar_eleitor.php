<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos necessários foram enviados via POST
    if (
        isset($_POST['eleitor_id']) && isset($_POST['nome']) && isset($_POST['email'])
        && isset($_POST['nif']) && isset($_POST['data_nascimento']) && isset($_POST['num_eleitor'])
        && isset($_POST['senha'])
    ) {
        $eleitor_id = $_POST['eleitor_id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nif = $_POST['nif'];
        $data_nascimento = $_POST['data_nascimento'];
        $num_eleitor = $_POST['num_eleitor'];
        $senha = $_POST['senha'];

        // Preparar a declaração SQL usando Prepared Statements
        $sql = "UPDATE eleitores SET nome = ?, email = ?, nif = ?, 
        data_nascimento = ?, num_eleitor = ?, senha = ? WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        // Vincular parâmetros e executar a declaração
        mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $email, $nif, 
        $data_nascimento, $num_eleitor, $senha, $eleitor_id);

        if (mysqli_stmt_execute($stmt)) {
            // Redireciona para a página eleitores.php após a atualização bem-sucedida
            header("Location: eleitores.php");
            exit(); // Garante que o script pare após o redirecionamento
        } else {
            echo "Erro ao atualizar informações do eleitor.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Por favor, preencha todos os campos necessários.";
    }
} else {
    echo "Requisição inválida.";
}

mysqli_close($conn);
?>
