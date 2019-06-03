<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['CPF'] ?></td>
            <td><?= $cliente['Nome'] ?></td>
            <td><?= $cliente['Sobrenome'] ?></td>
            <td><?= $cliente['dataNasc'] ?></td>
            <td><?= $cliente['sexo'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
            <td><a href="./cliente/ver/<?= $cliente['CPF'] ?>">Ver</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./cliente/adicionar" class="btn btn-primary">Novo Cliente</a>