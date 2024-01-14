<?php
$tipo_mensagem = isset($_GET['tipo']) ? $_GET['tipo'] : '';

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    window.onload = function() {";

if ($tipo_mensagem === 'sucesso') {
    echo "Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: 'Cadastro Efetuado Com Sucesso.'
        }).then(function() {
            window.location.href = 'login.php';
        });";
} elseif ($tipo_mensagem === 'erro') {
    echo "Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Cadastro Já Efetuado Com Os Mesmos Dados.'
        }).then(function() {
            window.location.href = 'index.php';
        });";
} else {
    echo "console.log('Mensagem desconhecida.');";
}

echo "};
</script>";
