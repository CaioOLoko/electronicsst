<h2>Listar Produtos</h2>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Código de Barras</th>
            <th>Marca</th>
            <th>Memória</th>
            <th>Processador</th>
            <th>Polegadas</th>
            <th>S.O.</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?=$produto['codProduto']?></td>
        <td><?=$produto['categoria']?></td>
        <td><?=$produto['nome']?></td>
        <td><?=$produto['valUnit']?></td>
        <td><?=$produto['infoProduto']?></td>
        <td><?=$produto['codDeBarras']?></td>
        <td><?=$produto['marca']?></td>
        <td><?=$produto['memoria']?></td>
        <td><?=$produto['processador']?></td>
        <td><?=$produto['PolegadaTela']?></td>
        <td><?=$produto['SistOper']?></td>
        <td><a href="./produto/ver/<?=$produto['codProduto']?>">Ver</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="./produto/adicionar" class="btn btn-primary">Novo Produto</a>