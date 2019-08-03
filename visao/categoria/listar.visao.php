<h2>Listar Categorias</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Categoria</th>
            <th>Ver Detalhes</th>
            <th>Alterar</th>
            <th>Deletar Categoria</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?=$categoria['idcategoria']?></td>
        <td><?=$categoria['descricao']?></td>
        <td><a href="./categoria/ver/<?= $categoria['idcategoria'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
        <td><a href="./categoria/editar/<?= $categoria['idcategoria'] ?>" style="color:black; text-decoration: underline;">Alterar</a></td>
        <td><a href="./categoria/deletar/<?= $categoria['idcategoria'] ?>" style="color:black; text-decoration: underline;">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br><a href="./categoria/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;">Nova Categoria</a>