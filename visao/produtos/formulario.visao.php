<form action="" method="POST" enctype="multipart/form-data" class="form-produto">
    <h1>Cadastro de Produto</h1>

    <div class="form-div">
        <div class="form-div-info">
            <label for="nomeproduto">Nome do Produto:</label>
            <input type="text" name="nomeproduto" value="<?= @$produto['nomeproduto'] ?>">
        </div>

        <div class="form-div-info">
            <label for="preco">Preço do Produto:</label>
            <input type="text" name="preco" value="<?= @$produto['preco'] ?>">
        </div>

        <div class="form-div-info">
            <label for="cod_barras">Código de Barras:</label>
            <input type="number" name="cod_barras" value="<?= @$produto['cod_barras'] ?>">
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="imagem">Imagem do Produto:</label>
            <input type="file" name="imagem" id="imagem">
        </div>

        <div class="form-div-info">
            <label for="descricao">Informações do Produto:</label>
            <textarea type="text" name="descricao"><?= @$produto['descricao'] ?></textarea>
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="default">Selecione uma categoria</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nomecategoria'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-div-info">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" value="<?= @$produto['marca'] ?>">
        </div>

        <div class="form-div-info">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" value="<?= @$produto['modelo'] ?>">
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="cor">Cor:</label>
            <input type="text" name="cor" value="<?= @$produto['cor'] ?>">
        </div>

        <div class="form-div-info">
            <label for="display">Tamanho do Display:</label>
            <input type="text" name="display" value="<?= @$produto['display'] ?>">
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="tipo_chip">Tipo de Chip:</label>
            <input type="text" name="tipo_chip" value="<?= @$produto['tipo_chip'] ?>">
        </div>

        <div class="form-div-info">
            <label for="quant_chip">Quantidade de Chips:</label>
            <input type="number" name="quant_chip" value="<?= @$produto['quant_chip'] ?>">
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="processador">Processador:</label>
            <input type="text" name="processador" value="<?= @$produto['processador'] ?>">
        </div>

        <div class="form-div-info">
            <label for="so">Sistema Operacional:</label>
            <input type="text" name="so" value="<?= @$produto['so'] ?>">
        </div>

        <div class="form-div-info">
            <label for="mem_interna">Memória Interna:</label>
            <input type="text" name="mem_interna" value="<?= @$produto['mem_interna'] ?>">
        </div>
    </div>

    <div class="form-div">
        <div class="form-div-info">
            <label for="estoque_minimo">Estoque Mínimo:</label>
            <input type="number" name="estoque_minimo" value="<?= @$produto['estoque_minimo'] ?>">
        </div>

        <div class="form-div-info">
            <label for="estoque_maximo">Estoque Máximo:</label>
            <input type="number" name="estoque_maximo" value="<?= @$produto['estoque_maximo'] ?>">
        </div>

        <div class="form-div-info">
            <label for="quant_estoque">Quantidade de Estoque:</label>
            <input type="number" name="quant_estoque" value="<?= @$produto['quant_estoque'] ?>">
        </div>
    </div>

    <button type="submit" class="form-button">Cadastrar</button>
</form>