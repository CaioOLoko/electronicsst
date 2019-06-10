<?php
if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<style type="text/css">
    .tabela {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
    }
</style>

<form action="" method="POST">
    
    <label for="nomedoproduto">Nome do Produto:</label>
    <input type="text" name="nomedoproduto"><br><br>

    <label for="preco">Preço do Produto:</label>
    <input type="text" name="preco"><br><br>

    <label for="descricao">Informações do Produto:</label><br>
    <textarea name="descricao" rows="5" cols="33"></textarea><br><br>

    <label for="imagem">Imagem do Produto:</label>
    <input type="url" name="imagem"><br><br>
  
    <label for="estoque_minimo">Estoque Mínimo:</label>
    <input type="number" name="estoque_minimo"><br><br>

    <label for="estoque_maximo">Estoque Máximo:</label>
    <input type="number" name="estoque_maximo"><br><br>
    
    <button type="submit">Enviar</button>
    
</form>

