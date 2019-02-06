<?php require_once("cabecalho.php");
			require_once("banco-categoria.php");
			$categorias = listaCategorias($conexao);
?>
  <div class="principal">
  	<h1>Formulário de cadastro</h1>
	</div>
	<form action="adiciona-produto.php" method="post">
	  <div class="form-group">
	    <label for="nome">Nome:</label>
	    <input type="text" class="form-control" id="nome" name="nome">
	  </div>
	  <div class="form-group">
	    <label for="preco">Preço:</label>
	    <input type="number" step="0.01" class="form-control" id="preco" name="preco">
	  </div>
	  <div class="form-group">
	    <label for="descricao">Descrição:</label>
			<textarea class="form-control" rows="4" id="descricao" name="descricao"></textarea>
	  </div>
	  <div class="form-group">
		    <div class="checkbox">
            <label><input type="checkbox" name="usado" value="true" id="usado">Usado</label>
	      </div>
		</div>
	  <div class="form-group">
		  <label for="categoria_id">Categoria:</label>
			<select id="categoria_id" name="categoria_id"  class="form-control">
			<?php 
				foreach($categorias as $categoria) : 
				?>
				<option value="<?=$categoria['id']?>">
								<?=$categoria['nome']?>
				</option>
				<?php endforeach ?>
			</select>		
	  </div>
		<button type="submit" class="btn btn-default">Cadastrar</button>
	</form>  
<?php require_once("rodape.php"); ?>
