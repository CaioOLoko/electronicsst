<form action="" method="POST" enctype="multipart/form-data" class="form-produto">
	<h1>Cadastro de Produto</h1>

	<br>

	<div>
		<div>
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome">
		</div>

		<div>
			<label for="preco">Preço:</label>
			<input type="text" name="preco" id="preco">
		</div>
	</div>

	<br>

	<div>
		<div>
			<label for="categoria">Categoria:</label>
			<select name="categoria" id="categoria">
				<?php foreach ($categorias as $categoria): ?>
					<option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['nome'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<label for="marca">Marca:</label>
			<select name="marca" id="marca">
				<?php foreach ($marcas as $marca): ?>
					<option value="<?= $marca['idMarca'] ?>"><?= $marca['nome'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<br>

	<div>
		<div>
			<label for="imagem">Imagem do Produto:</label>
			<input type="file" name="imagem" id="imagem">
		</div>

		<div>
			<label for="descricao">Informações do Produto:</label>
			<textarea type="text" name="descricao" id="descricao" placeholder="Adicione uma descrição"></textarea>
		</div>
	</div>

	<br>

	<div>
		<p>Estoque</p>

		<div>
			<div>
				<label for="estoque_minimo">Mínimo:</label>
				<input type="number" name="estoque_minimo">
			</div>

			<div>
				<label for="estoque_maximo">Máximo:</label>
				<input type="number" name="estoque_maximo">
			</div>

			<div>
				<label for="quant_estoque">Atual:</label>
				<input type="number" name="quant_estoque">
			</div>
		</div>
	</div>

	<button type="submit" class="form-button">Cadastrar</button>
</form>

<br><br>