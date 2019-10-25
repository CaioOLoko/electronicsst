<?php if (isset($categorias)): ?>
    <table class="table" border="1">
        <thead>
            <tr>Nome</tr>
        </thead>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td>
                    <a href="produto/buscarPorCategoria/<?= $categoria['idCategoria'] ?>"><?= $categoria['nome'] ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Estoque Mínimo</th>
            <th>Estoque Máximo</th>
            <th>Quantidade de Estoque</th>
            <th>Ver</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><img src="<?= $produto['imagem'] ?>" style="heigth: 100px; width: 100px;"></td>
            <td><?= $produto['idProduto'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 30) . "..." ?></td>
            <td><?= $produto['estoque_minimo'] ?></td>
            <td><?= $produto['estoque_maximo'] ?></td>
            <td><?= $produto['quant_estoque'] ?></td>
            <td><a href="produto/visualizar/<?= $produto['idProduto'] ?>" style="color: #000000;">Detalhes</a></td>
            <td><a href="produto/editar/<?= $produto['idProduto'] ?>">Alterar</a></td>
            <td><a href="produto/deletar/<?= $produto['idProduto'] ?>">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="produto/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;">Adicionar Produto</a>

<br>

<a href="produto/upload" class="btn btn-primary" style="color:black; text-decoration: underline;">Adicionar Lista de Produtos</a>