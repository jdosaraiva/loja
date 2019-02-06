<?php include "cabecalho.php";
    include "banco-produto.php";

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

    $produtos = listaProdutos($conexao);
?>

<a class="btn btn-primary" href="produto-formulario.php" role="button">Adicionar Produto</a>
<br>
<br>

<table class="table table-striped table-bordered">
<thead>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Ação</th>
      </tr>
</thead>
<tbody>
<?php
foreach($produtos as $produto) :
?>

    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= $produto['descricao'] ?></td>
        <td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>        
    </tr>

<?php
endforeach
?>
</tbody>
</table>
<a class="btn btn-primary" href="produto-formulario.php" role="button">Adicionar Produto</a>
<?php include "rodape.php"; ?> 
