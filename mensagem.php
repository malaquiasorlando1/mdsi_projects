<?php
$tipo_mensagem = isset($_GET['tipo']) ? $_GET['tipo'] : '';

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    window.onload = function() {";

if ($tipo_mensagem === 'sucesso') {
    echo "Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: 'Validação Efetuada Com Sucesso.'
        }).then(function() {
            window.location.href = 'candidato_votar.php';
        });";
} elseif ($tipo_mensagem === 'codigo_inexistente') {
    echo "Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Código Inválido.'
        }).then(function() {
            window.location.href = 'index.php';
        });";
} elseif ($tipo_mensagem === 'codigo_usado') {
    echo "Swal.fire({
            icon: 'info',
            title: 'Código Já Usado!',
            text: 'Não Tens Permissão.'
        }).then(function() {
            window.location.href = 'index.php';
        });";
} else {
    echo "console.log('Mensagem desconhecida.');";
}

echo "};
</script>";
