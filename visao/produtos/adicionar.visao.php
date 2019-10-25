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

		<div>
			<label for="cod_barras">Código:</label>
			<input type="number" name="cod_barras" id="cod_barras">
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

	<br>

	<div>
		<label for="">Tipo de Chip:</label>
		<select name="tipo_chip" id="tipo_chip">
			<option value="Mini">Mini</option>
			<option value="Micro">Micro</option>
			<option value="Nano">Nano</option>
		</select>

		<div>
			<label for="quant_chip">Quantidade:</label>
			<select name="quant_chip" id="quant_chip">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
	</div>

	<br>

	<div>
		<label for="mem_interna">Memória Interna:</label>
		<input type="number" name="mem_interna">
		<input type="radio" name="mem_interna_quant" value="GB" id="gb" checked=""><label for="gb">GB (GigaBytes)</label>
		<input type="radio" name="mem_interna_quant" value="TB" id="tb"><label for="tb">TB (TeraBytes)</label>
	</div>

	<br>

	<div>
		<label for="mem_interna">Memória RAM:</label>
		<input type="number" name="mem_ram">
	</div>

	<br>

	<div>
		<div>
			<label for="processador">Processador:</label>
			<select name="marca_proc" id="processador">
				<option value="Amd">AMD</option>
				<option value="SnapDragon">SnapDragon</option>
				<option value="Intel">Intel</option>
			</select>
			<input type="text" name="processador" id="processador">
		</div>

		<div>
			<label for="so">Sistema Operacional:</label>
			<select name="so" id="so">
				<option value="Android">Android</option>
				<option value="Linux">Linux</option>
				<option value="Macintosh">Macintosh(Mac)</option>
				<option value="Windows">Windows</option>
			</select>
		</div>
	</div>

	<br>

	<div>
		<div>
			<label for="cor">Cor:</label>
			<input type="text" name="cor" id="cor">
		</div>

		<div>
			<label for="display">Tamanho do Display:</label>
			<input type="text" name="display" id="display">
		</div>
	</div>

	<br>

	<button type="submit" class="form-button">Cadastrar</button>
</form>

<br><br>