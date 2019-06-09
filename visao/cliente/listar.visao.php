<h2>Listar Clientes</h2><br>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Tipo de Usuário</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['nomeusuario'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['cpf'] ?></td>
            <td><?= $cliente['datadenascimento'] ?></td>
            <td><?= $cliente['sexo'] ?></td>
            <td><?= $cliente['tipousuario'] ?></td>
            <td><a href="./cliente/ver/<?= $cliente['idusuario'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./cliente/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;"><br><br>Novo Cliente</a>
