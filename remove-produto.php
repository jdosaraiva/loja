<?php require_once("cabecalho.php");
require_once("conecta.php");
require_once("banco-produto.php");

$id = $_POST['id'];

if (removeProduto($conexao, $id)) {
    header("Location: produto-lista.php?removido=true");
    die();
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto <?= $nome ?> não foi excluído: <?= $msg?></p>
    <?php
}

require_once("rodape.php"); ?>
?>