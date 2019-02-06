<?php
require_once("conecta.php");

function listaProdutos($conexao) {
    $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos p INNER JOIN categorias c ON (p.categoria_id = c.id)";
    $produtos = array();
    $resultado = mysqli_query($conexao, $query);

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;

}

function findProdutoById($conexao, $id) {
    $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos p INNER JOIN categorias c ON (p.categoria_id = c.id) WHERE p.id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    $produto = mysqli_fetch_assoc($resultado);
    return $produto;
}

function insereProduto($conexao, $nome, $preco, $descricao, $usado, $categoria_id) {
    $query = "insert into produtos (nome, preco, descricao, usado, categoria_id) values ('{$nome}', {$preco}, '{$descricao}', {$usado}, {$categoria_id})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $usado, $categoria_id) {
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', usado = $usado, categoria_id = '{$categoria_id}'  where id = {$id}";
    return mysqli_query($conexao, $query);
}
