<h2>Listar Categorias</h2>

<table class="table">
    <thead>
        <tr>
            <th>Código do Produto</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?=$categoria['idProduto']?></td>
        <td><?=$categoria['idCategoria']?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="./categoria/adicionar" class="btn btn-primary">Nova Categoria</a>