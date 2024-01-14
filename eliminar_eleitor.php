<?php
// Verificar se foi recebido um ID válido para exclusão
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "voting";

    // Criar conexão
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar conexão
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Obter o ID do eleitor a ser excluído e preparar a declaração SQL
    $eleitor_id = $_GET['id'];

    // Preparar a declaração SQL usando Prepared Statements
    $sql = "DELETE FROM eleitores WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Vincular parâmetros e executar a declaração
    mysqli_stmt_bind_param($stmt, "i", $eleitor_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirecionar de volta para a página de eleitores após a exclusão
        header("Location: eleitores.php");
        exit();
    } else {
        echo "Erro ao tentar excluir o eleitor.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "ID de eleitor inválido";
}
?>
