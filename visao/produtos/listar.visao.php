<?php if (isset($categorias)): ?>
    <table class="table" border="1">
        <thead>
            <tr>Nome</tr>
        </thead>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><a href="produto/buscarPorCategoria/<?= $categoria['idcategoria'] ?>"><?= $categoria['nomecategoria'] ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<table class="table" border="1">
    <thead>
        <tr>
            <th></th>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Estoque Mínimo</th>
            <th>Estoque Máximo</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><img src="<?= $produto['imagem'] ?>" style="heigth: 100px; width: 100px;"></td>
            <td><?= $produto['idproduto'] ?></td>
            <td><?= $produto['nomeproduto'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 30) . "..." ?></td>
            <td><?= $produto['estoque_minimo'] ?></td>
            <td><?= $produto['estoque_maximo'] ?></td>
            <td><a href="produto/ver/<?= $produto['idproduto'] ?>" style="color: #000000;">Ver detalhes</a></td>
        </tr>
    <?php endforeach; ?>
</table>