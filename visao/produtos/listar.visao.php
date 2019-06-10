<h2>Listar Produtos</h2>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Imagem:</th>
            <th>Estoque Mínimo</th>
            <th>Estoque Máximo</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?=$produto['idproduto']?></td>
        <td><?=$produto['nomeproduto']?></td>
        <td><?=$produto['preco']?></td>
        <td><?=$produto['descricao']?></td>
        <td><?=$produto['imagem']?></td>
        <td><?=$produto['estoque_minimo']?></td>
        <td><?=$produto['estoque_maximo']?></td>
        <td><a href="./produto/ver/<?=$produto['idproduto']?>" style="color: #000000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="./produto/adicionar" class="btn btn-primary">Novo Produto</a>