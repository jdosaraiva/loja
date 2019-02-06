<?php require_once("cabecalho.php");
	  require_once("banco-produto.php");
	  require_once("banco-categoria.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}
$id_categoria = $_POST['categoria_id'];

if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $usado, $id_categoria)) {
    header("Location: produto-lista.php?alterado=true");
    die();
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto <?= $nome ?> não foi alterado: <?= $msg?></p>
    <?php
}

require_once("rodape.php"); ?>
