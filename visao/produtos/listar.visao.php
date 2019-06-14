<h2>Listar Produtos</h2><br>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Imagem</th>
            <th>Estoque Mínimo</th>
            <th>Estoque Máximo</th>
            <th>Ver Detalhes</th>
            <th>Deletar Produto</th>
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
        <td><a href="./produto/ver/<?=$produto['idproduto']?>" style="color: black; text-decoration: underline;">Ver</a></td>
        <td><a href="./produto/deletar/<?=$produto['idproduto']?>" style="color: black; text-decoration: underline;">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br><a href="./produto/adicionar" class="btn btn-primary" style="color:black;text-decoration: underline;">Novo Produto</a>