<h2>Listar Clientes</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Tipo de Usuário</th>
            <th>Ver Detalhes</th>
            <th>Alterar</th>
            <th>Deletar o Usuário</th>
        </tr>
    </thead>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['cpf'] ?></td>
            <td><?= $usuario['nascimento'] ?></td>
            <td><?= $usuario['sexo'] ?></td>
            <td><?= $usuario['tipo'] ?></td>
            <td><a href="usuario/visualizar/<?= $usuario['idUsuario'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
            <td><a href="usuario/editar/<?= $usuario['idUsuario'] ?>" style="color:black; text-decoration: underline;">Alterar</a></td>
            <td><a href="usuario/deletar/<?= $usuario['idUsuario'] ?>" style="color:black; text-decoration: underline;">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./cliente/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;"><br><br>Novo Cliente</a>
