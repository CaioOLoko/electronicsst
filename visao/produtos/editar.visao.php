<form action="" method="POST" enctype="multipart/form-data" class="form-produto">
    <h1>Edição de Produto</h1>
    <label for="nomeproduto">Nome do Produto:</label>
    <input type="text" name="nome" value="<?= @$produto['nome'] ?>">

    <label for="preco">Preço do Produto:</label>
    <input type="text" name="preco" value="<?= @$produto['preco'] ?>">

    <label for="categoria">Categoria:</label>
    <select name="categoria" id="categoria">
        <option value="default">Selecione uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="marca">Marca:</label>
    <select name="marca" id="marca">
        <option value="default">Selecione uma marca</option>
        <?php foreach ($marcas as $marca): ?>
            <option value="<?= $marca['idMarca'] ?>"><?= $marca['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="descricao">Informações do Produto:</label>
    <input type="text" name="descricao" value="<?= @$produto['descricao'] ?>">

    <label for="imagem">Imagem do Produto:</label>
    <input type="file" name="imagem" style="width:250px">

    <label for="estoque_minimo">Estoque Mínimo:</label>
    <input type="number" name="estoque_minimo" value="<?= @$produto['estoque_minimo'] ?>">

    <label for="estoque_maximo">Estoque Máximo:</label>
    <input type="number" name="estoque_maximo" value="<?= @$produto['estoque_maximo'] ?>">

    <label for="quant_estoque">Quantidade de Estoque:</label>
    <input type="number" name="quant_estoque" value="<?= @$produto['quant_estoque'] ?>">

    <button type="submit">Atualizar</button>
</form>