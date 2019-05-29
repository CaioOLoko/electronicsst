<h2>Listar Categorias</h2>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?=$categoria['idCategoria']?></td>
        <td><?=$categoria['nomeCategoria']?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="./categoria/adicionar" class="btn btn-primary">Nova Categoria</a>