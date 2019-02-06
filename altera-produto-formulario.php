<?php require_once("cabecalho.php");
			require_once("banco-produto.php");
			require_once("banco-categoria.php");

			$id = $_GET['id'];
      $produto = findProdutoById($conexao, $id);
			$categorias = listaCategorias($conexao);
			$usado = $produto['usado'] ? "checked='checked'" : "";
?>
  <div class="principal">
  	<h1>Formulário de cadastro</h1>
	</div>
	<form action="altera-produto.php" method="post">
    <input type="hidden" class="form-control" id="id" name="id" value="<?=$produto['id']?>">
	  <div class="form-group">
	    <label for="nome">Nome:</label>
	    <input type="text" class="form-control" id="nome" name="nome" value="<?=$produto['nome']?>">
	  </div>
	  <div class="form-group">
	    <label for="preco">Preço:</label>
	    <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?=$produto['preco']?>">
	  </div>
	  <div class="form-group">
	    <label for="descricao">Descrição:</label>
			<textarea class="form-control" rows="4" id="descricao" name="descricao"><?=$produto['descricao']?></textarea>
	  </div>
	  <div class="form-group">
		    <div class="checkbox">
            <label><input type="checkbox" name="usado" <?=$usado?> value="true">Usado</label>
	      </div>
		</div>
	  <div class="form-group">
		  <label for="categoria_id">Categoria:</label>
			<select name="categoria_id" class="form-control">
        <?php 

            foreach($categorias as $categoria) : 
                $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                $selecao = $essaEhACategoria ? "selected='selected'" : "";

        ?>
            <option value="<?=$categoria['id']?>" <?=$selecao?>>
                    <?=$categoria['nome']?>
            </option>
        <?php endforeach ?>
        </select>		
	  </div>
		
		<button type="submit" class="btn btn-default">Salvar</button>
	</form>  
<?php require_once("rodape.php"); ?>
