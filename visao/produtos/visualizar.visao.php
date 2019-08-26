<img src="<?= $produto['imagem'] ?>" alt="" style="width: 100px; height: 60px;">

<!-- ./publico/img/user/user.png -->
<h2>Descrição do Produto</h2><br>
<div>
    <strong>Código:&nbsp;&nbsp;</strong> <?= $produto['idproduto'] ?><br>
    <strong>Nome:&nbsp;&nbsp;</strong> <?= $produto['nomeproduto'] ?><br>
    <strong>Preço:&nbsp;&nbsp;</strong> <?= $produto['preco'] ?><br>
    <strong>Categoria:&nbsp;&nbsp;</strong> <?= $produto['idcategoria'] ?><br>
    <strong>Informações:&nbsp;&nbsp;</strong> <?= $produto['descricao'] ?><br>
    <strong>Estoque Mínimo:&nbsp;&nbsp;</strong> <?= $produto['estoque_minimo'] ?><br>
    <strong>Estoque Máximo:&nbsp;&nbsp;</strong> <?= $produto['estoque_maximo'] ?><br>
</div>
<br><br>
<a href="compras/adicionar/<?= $produto['idproduto'] ?>" style="color: #000000;text-decoration: underline">Comprar</a>
<a href="." style="color: #000000;text-decoration: underline">Voltar</a>