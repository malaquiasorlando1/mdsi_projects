<?php
$tipo_mensagem = isset($_GET['tipo']) ? $_GET['tipo'] : '';

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    window.onload = function() {";

if ($tipo_mensagem === 'sucesso') {
    echo "Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: 'Voto Efetuado Com Sucesso.',
            showConfirmButton: false,
            timer: 1000
        }).then(function() {
            window.location.href = 'index.php';
        });";
} else {
    echo "console.log('Mensagem desconhecida.');";
}

echo "};
</script>";
