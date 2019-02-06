<?php require_once("cabecalho.php");
    require_once("banco-produto.php");

    if (array_key_exists("removido", $_GET) && $_GET['removido']=='true') { 
    ?> 
        <p class="alert-success">Produto apagado com sucesso.</p>
    <?php 
    } 
    if (array_key_exists("inserido", $_GET) && $_GET['inserido']=='true') { 
    ?>
        <p class="alert-success">Produto incluído com sucesso.</p>
    <?php 
    } 
    if (array_key_exists("alterado", $_GET) && $_GET['alterado']=='true') { 
    ?>
        <p class="alert-success">Produto alterado com sucesso.</p>
    <?php 
    } 
    
    $produtos = listaProdutos($conexao);
?>

<a class="btn btn-primary" href="produto-formulario.php" role="button">Adicionar Produto</a>
<br>
<br>

<table class="table table-striped table-bordered">
<thead>
      <tr>
        <th style="width: 25%;">Nome</th>
        <th style="width: 10%;">Preço</th>
        <th style="width: 25%;">Descrição</th>
        <th style="width: 10%;">Usado</th>
        <th style="width: 10%;">Categoria</th>
        <th colspan="2" style="width: 20%; text-align: center;">Ação</th>
      </tr>
</thead>
<tbody>
<?php
foreach($produtos as $produto) :
    $usado = $produto['usado'] ? "Sim" : "Não";
?>

    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= $produto['descricao'] ?></td>
        <td><?= $usado ?></td>
        <td><?= $produto['nome_categoria'].substr(0, 25) ?></td>
        <td style="text-align: center;"><a class="btn btn-primary" href="altera-produto-formulario.php?id=<?=$produto['id']?>" role="button">Alterar</a></td>
        <td style="text-align: center;">
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>" />
                <button class="btn btn-danger">Remover</button>
            </form>
        </td>        
    </tr>

<?php
endforeach
?>
</tbody>
</table>
<a class="btn btn-primary" href="produto-formulario.php" role="button">Adicionar Produto</a>
<?php require_once("rodape.php"); ?> 
