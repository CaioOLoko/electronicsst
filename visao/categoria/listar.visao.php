<h2>Listar Categorias</h2>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Categoria</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?=$categoria['idCategoria']?></td>
        <td><?=$categoria['descricao']?></td>
        <td><a href="./categoria/ver/<?= $categoria['idCategoria'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="./categoria/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Nova Categoria</a>