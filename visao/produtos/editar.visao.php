<form action="" method="POST" enctype="multipart/form-data" class="form-produto">
    <h1>Edição de Produto</h1>
    <label for="nomeproduto">Nome do Produto:</label>
    <input type="text" name="nomeproduto" style="width:250px" value="<?= @$produto['nomeproduto'] ?>">

    <label for="preco">Preço do Produto:</label>
    <input type="text" name="preco" style="width:250px" value="<?= @$produto['preco'] ?>">

    <label for="categoria">Categoria:</label>
    <select name="categoria" id="categoria">
        <option value="default">Selecione uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nomecategoria'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="descricao">Informações do Produto:</label>
    <input type="text" name="descricao" style="width:250px" value="<?= @$produto['descricao'] ?>">

    <label for="cod_barras">Código de Barras:</label>
    <input type="number" name="cod_barras" style="width:250px" value="<?= @$produto['cod_barras'] ?>">

    <label for="marca">Marca:</label>
    <input type="text" name="marca" style="width:250px" value="<?= @$produto['marca'] ?>">

    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" style="width:250px" value="<?= @$produto['modelo'] ?>">

    <label for="cor">Cor:</label>
    <input type="text" name="cor" style="width:250px" value="<?= @$produto['cor'] ?>">

    <label for="tipo_chip">Tipo de Chip:</label>
    <input type="text" name="tipo_chip" style="width:250px" value="<?= @$produto['tipo_chip'] ?>">

    <label for="quant_chip">Quantidade de Chips:</label>
    <input type="number" name="quant_chip" style="width:250px" value="<?= @$produto['quant_chip'] ?>">

    <label for="mem_interna">Memória Interna:</label>
    <input type="text" name="mem_interna" style="width:250px" value="<?= @$produto['mem_interna'] ?>">

    <label for="processador">Processador:</label>
    <input type="text" name="processador" style="width:250px" value="<?= @$produto['processador'] ?>">

    <label for="display">Tamanho do Display:</label>
    <input type="text" name="display" style="width:250px" value="<?= @$produto['display'] ?>">

    <label for="so">Sistema Operacional:</label>
    <input type="text" name="so" style="width:250px" value="<?= @$produto['so'] ?>">

    <label for="imagem">Imagem do Produto:</label>
    <input type="file" name="imagem" style="width:250px">

    <label for="estoque_minimo">Estoque Mínimo:</label>
    <input type="number" name="estoque_minimo" style="width:250px" value="<?= @$produto['estoque_minimo'] ?>">

    <label for="estoque_maximo">Estoque Máximo:</label>
    <input type="number" name="estoque_maximo" style="width:250px" value="<?= @$produto['estoque_maximo'] ?>">

    <label for="quant_estoque">Quantidade de Estoque:</label>
    <input type="number" name="quant_estoque" style="width:250px" value="<?= @$produto['quant_estoque'] ?>">

    <button type="submit">Atualizar</button>
</form>