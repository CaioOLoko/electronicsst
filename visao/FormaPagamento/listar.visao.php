<h2>Listar Formas de Pagamentos</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Forma de Pagamento</th>
            <th>Ver Detalhes</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <?php foreach ($formaspagamentos as $formapagamento): ?>
    <tr>
        <td><?=$formapagamento['idFormaPagamento']?></td>
        <td><?=$formapagamento['descricao']?></td>
        <td><a href="./FormaPagamento/ver/<?= $formapagamento['idFormaPagamento'] ?>" style="color:black; text-decoration: underline;">Ver</a></td>
        <td><a href="./FormaPagamento/editar/<?= $formapagamento['idFormaPagamento'] ?>" style="color:black; text-decoration: underline;">Alterar</a></td>
        <td><a href="./FormaPagamento/deletar/<?= $formapagamento['idFormaPagamento'] ?>" style="color:black; text-decoration: underline;">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br><a href="./FormaPagamento/adicionar" class="btn btn-primary" style="color:black; text-decoration: underline;">Nova Forma de Pagamento</a>