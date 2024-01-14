<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o método de requisição é POST e se o campo searchText foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchText'])) {
    $searchText = '%' . $_POST['searchText'] . '%';

    $consulta_sql = "SELECT * FROM eleitores WHERE LOWER(nome) LIKE LOWER(?) OR LOWER(nif) LIKE LOWER(?)";
    
    // Preparar a declaração SQL usando Prepared Statements
    $stmt = mysqli_prepare($conn, $consulta_sql);

    // Vincular parâmetros e executar a declaração
    mysqli_stmt_bind_param($stmt, "ss", $searchText, $searchText);
    mysqli_stmt_execute($stmt);
    
    // Obter os resultados
    $resultado = mysqli_stmt_get_result($stmt);

    echo "<table class='table' id='eleitoresTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>NIF</th>";
    echo "<th>Data De Nascimento</th>";
    echo "<th>Número De Eleitor</th>";
    echo "<th>Acções</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td class='text-white'>" . $row['nome'] . "</td>";
            echo "<td class='text-white'>" . $row['nif'] . "</td>";
            echo "<td class='text-white'>" . $row['data_nascimento'] . "</td>";
            echo "<td class='text-white'>" . $row['num_eleitor'] . "</td>";

            echo "<td class='text-white'>";
            echo "<a href='editar_eleitor.php?id=" . $row['id'] . "' class='btn editar-btn'>Editar</a>";
            echo " | ";
            echo "<a href='eliminar_eleitor.php?id=" . $row['id'] . "' class='btn eliminar-btn'>Eliminar</a>";
            echo "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum Eleitor Encontrado.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";

    mysqli_stmt_close($stmt);
} else {
    echo "Não foi possível realizar a busca.";
}

mysqli_close($conn);
?>
