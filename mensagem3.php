<?php
$tipo_mensagem = isset($_GET['tipo']) ? $_GET['tipo'] : '';

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    window.onload = function() {";

if ($tipo_mensagem === 'sucesso') {
    echo "Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: 'Login Efetuado Com Sucesso.'
        }).then(function() {
            window.location.href = 'eleitor_votar.php';
        });";
} elseif ($tipo_mensagem === 'erro') {
    echo "Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Você Não Está Cadastrado, Por Favor, Realize O Cadastro.'
        }).then(function() {
            window.location.href = 'cadastro.php';
        });";
} elseif ($tipo_mensagem === 'ja_logado') {
    echo "Swal.fire({
            icon: 'info',
            title: 'Usuário Já Logado!',
            text: 'Você Já Está Logado E Não É Permitido Fazer Login Novamente.'
        }).then(function() {
            window.location.href = 'index.php';
        });";
} else {
    echo "console.log('Mensagem desconhecida.');";
}

echo "};
</script>";
