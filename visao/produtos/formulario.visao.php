<?php
if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<style type="text/css">
    .tabela{
        font-family: 'Verdana', 'Arial', 'Helvetica', sans-serif;
        font-size: 10px;
    }
</style>

<form action="" method="POST" enctype="multipart/form-data">
    <h1>Cadastro de Produto</h1><br>
    <label for="nomeproduto">Nome do Produto:</label><br>
    <input type="text" name="nomeproduto" style="width:250px" value="<?= @$produto['nomeproduto'] ?>"><br><br>

    <label for="preco">Preço do Produto:</label><br>
    <input type="text" name="preco" style="width:250px" value="<?= @$produto['preco'] ?>"><br><br>

    <label>Categoria:</label>
    <select name="categoria">
        <option value="default">Selecione uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nomecategoria'] ?></option>
        <?php endforeach; ?>
    </select>

    <br><br><label for="descricao">Informações do Produto:</label><br>
    <input type="text" name="descricao" style="width:250px" value="<?= @$produto['descricao'] ?>"><br><br>
    
        <label for="cod_barras">Código de Barras:</label><br>
    <input type="file" name="cod_barras" style="width:250px" value="<?= @$produto['cod_barras'] ?>"><br><br>

    <label for="descricao">Informações do Produto:</label><br>
    <input type="text" name="descricao" style="width:250px" value="<?= @$produto['descricao'] ?>"><br><br>

    <label for="marca">Marca:</label><br>
    <input type="file" name="marca" style="width:250px" value="<?= @$produto['marca'] ?>"><br><br>

    <label for="modelo">Modelo:</label><br>
    <input type="file" name="modelo" style="width:250px" value="<?= @$produto['modelo'] ?>"><br><br>

    <label for="cor">Cor:</label><br>
    <input type="file" name="cor" style="width:250px" value="<?= @$produto['cor'] ?>"><br><br>

    <label for="tipo_chip">Tipo de Chip:</label><br>
    <input type="file" name="tipo_chip" style="width:250px" value="<?= @$produto['tipo_chip'] ?>"><br><br>

    <label for="quant_chip">Quantidade de Chips:</label><br>
    <input type="file" name="quant_chip" style="width:250px" value="<?= @$produto['quant_chip'] ?>"><br><br>

    <label for="mem_interna">Memória Interna:</label><br>
    <input type="file" name="mem_interna" style="width:250px" value="<?= @$produto['mem_interna'] ?>"><br><br>

    <label for="processador">Processador:</label><br>
    <input type="file" name="processador" style="width:250px" value="<?= @$produto['processador'] ?>"><br><br>

    <label for="display">Tamanho do Display:</label><br>
    <input type="file" name="display" style="width:250px" value="<?= @$produto['display'] ?>"><br><br>

    <label for="so">Sistema Operacional:</label><br>
    <input type="file" name="so" style="width:250px" value="<?= @$produto['so'] ?>"><br><br>

    <label for="imagem">Imagem do Produto:</label><br>
    <input type="file" name="imagem" style="width:250px"><br><br>

    <label for="estoque_minimo">Estoque Mínimo:</label><br>
    <input type="number" name="estoque_minimo" value="<?= @$produto['estoque_minimo'] ?>"><br><br>

    <label for="estoque_maximo">Estoque Máximo:</label><br>
    <input type="number" name="estoque_maximo" value="<?= @$produto['estoque_maximo'] ?>"><br><br>

    <button type="submit">Enviar</button>

</form>