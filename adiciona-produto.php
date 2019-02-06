<?php 
include("conecta.php");
include("banco-produto.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
insereProduto($conexao, $nome, $preco, $descricao);

header("Location: produto-lista.php?inserido=true");
die();
?>