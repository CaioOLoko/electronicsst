<h2>Listar Categorias</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Detalhes</th>
            <th>Alterar</th>
            <th>Deletar Categoria</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?=$categoria['idCategoria']?></td>
        <td><?=$categoria['nome']?></td>
        <td><a href="categoria/visualizar/<?= $categoria['idCategoria'] ?>">Ver</a></td>
        <td><a href="categoria/editar/<?= $categoria['idCategoria'] ?>">Alterar</a></td>
        <td><a href="categoria/deletar/<?= $categoria['idCategoria'] ?>">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>
<a href="categoria/adicionar">Nova Categoria</a>