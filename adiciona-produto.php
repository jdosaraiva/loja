<?php require_once("cabecalho.php");
require_once("conecta.php");
require_once("banco-produto.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}
$id_categoria = $_POST['categoria_id'];

if (insereProduto($conexao, $nome, $preco, $descricao, $usado, $id_categoria)) {
    header("Location: produto-lista.php?inserido=true");
    die();
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto <?= $nome ?> não foi incluído: <?= $msg?></p>
    <?php
}


require_once("rodape.php"); ?>
