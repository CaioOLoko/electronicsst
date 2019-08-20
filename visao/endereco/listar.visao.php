<h2>Listar Endereços</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>CEP</th>
            <th>Ver Detalhes</th>
            <th>Alterar</th>
            <th>Deletar o Endereço</th>
        </tr>
    </thead>
    <?php foreach ($enderecos as $endereco): ?>
        <tr>
            <td><?= $endereco['logradouro'] ?></td>
            <td><?= $endereco['numero'] ?></td>
            <td><?= $endereco['complemento'] ?></td>
            <td><?= $endereco['bairro'] ?></td>
            <td><?= $endereco['cidade'] ?></td>
            <td><?= $endereco['cep'] ?></td>
            <td><a href="./endereco/ver/<?= $endereco['idendereco'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
            <td><a href="./endereco/editar/<?= $endereco['idendereco'] ?>" style="color:black; text-decoration: underline;">Alterar</a></td>
            <td><a href="./endereco/deletar/<?= $endereco['idendereco'] ?>" style="color:black; text-decoration: underline;">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./endereco/adicionar/<?= $endereco['idusuario'] ?>" class="btn btn-primary" style="color:black; text-decoration: underline;"><br><br>Novo Endereço</a>
