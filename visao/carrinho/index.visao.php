<div class="cestas-de-produtos">
    <div class="lista-de-produtos">
        <?php
        if (isset($_SESSION["carrinho"])):
            foreach ($produtos as $produto):?>
                <div class="caixa-produto">
                    <img class="produto-caixa-imagem" src="<?= $produto['imagem'] ?>">
                    <p><?= $produto['nomeproduto'] ?></p>
                    <strong><p>Preço:<?= $produto['preco'] ?></p></strong>
                    <p>Quantidade: <?= $produto["quantidade"] ?></p>
                    <a href="compras/removerProduto/<?= $produto['idproduto'] ?>">Remover Produto</a>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
    <div class="resumo-dos-pedidos">
        <h1>Resumo do Pedido</h1>
        <div>
            <p>Quantidade de Produtos: <?= $quantidadeProdutos ?></p>
            <p>Subtotal: <?= $subtotal ?></p>
        </div>
        <div>
            <p>Frete: <?=$frete?></p>
        </div>
        <div>
            <p>Total: <?=($subtotal+$frete)?></p>
        </div>
        <a></a>
    </div>
    <div>
        <form action="" method="POST">
            <input type="number" name="cep" placeholder="Informe um cep" max-lenght="8">
            <button type="submit">Vai</button>
        </form>
    </div>
</div>