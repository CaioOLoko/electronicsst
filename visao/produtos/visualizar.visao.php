<h2>Descrição do Produto</h2>

<p><strong>Código:</strong></p>       <?= $produto['idproduto'] ?>
<p><strong>Nome:</strong></p>        <?= $produto['nomeproduto'] ?>
<p><strong>Preço:</strong></p>        <?= $produto['preco'] ?>
<p><strong>Categoria:</strong></p>        <?=$produto['idcategoria'] ?>
<p><strong>Informações:</strong></p>        <?= $produto['descricao'] ?>
<p><strong>Imagem:</strong></p>        <?= $produto['imagem'] ?>
<p><strong>Estoque Mínimo:</strong></p>        <?= $produto['estoque_minimo'] ?>
<p><strong>Estoque Máximo:</strong></p>        <?= $produto['estoque_maximo'] ?>

<br><br>

<a href="./produto/listarProdutos" style="color: #000000;">Voltar</a>