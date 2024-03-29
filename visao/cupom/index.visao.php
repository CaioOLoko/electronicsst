<h2>Listar Cupons</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Desconto</th>
            <th>Ver Detalhes</th>
            <th>Alterar</th>
            <th>Deletar Cupom</th>
        </tr>
    </thead>
    <?php foreach ($cupons as $cupom): ?>
        <tr>
            <td><?= $cupom['idCupom'] ?></td>
            <td><?= $cupom['nome'] ?></td>
            <td><?= $cupom['desconto'] ?></td>
            <td><a href="./cupom/visualizar/<?= $cupom['idCupom'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
            <td><a href="./cupom/editar/<?= $cupom['idCupom'] ?>" style="color:black; text-decoration: underline;">Alterar</a></td>
            <td><a href="./cupom/deletar/<?= $cupom['idCupom'] ?>" style="color:black; text-decoration: underline;">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<br><br><a href="./cupom/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;">Novo Cupom</a>
