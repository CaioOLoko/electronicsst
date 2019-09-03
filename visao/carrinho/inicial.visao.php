<div>
    <div>
        <?php
        if (isset($_SESSION["carrinho"])):
            $produtos = $_SESSION["carrinho"];
            foreach ($produtos as $produto):
                ?>
                <div style="display: flex; flex-direction: row; width: 400px; justify-content: space-between">
                    <img style="heigth: 100px; width: 100px;" src="<?= $produto['imagem'] ?>">
                    <p><?= $produto['nomeproduto'] ?></p>
                    <p><?= $produto['preco'] ?></p>
                    <a href="compras/removerProduto/<?= $produto['idproduto'] ?>" style="color:black">Remover Produto</a>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
    <div>
        <h1>Resumo do Pedido</h1>
        <div>
            <p>Quantidade de Produtos: <?=$produtos["quantidade"] ?></p>
            <p><?= $produtos["subtotal"] ?></p>
        </div>
        <div>
            <p>Frete:</p>
            <?php
            if (isset($frete))
                echo $frete;
            ?>
        </div>
        <div>
            <p>Total:</p>
            <p><?= ($frete + $produtos["subtotal"]) ?></p>
        </div>
        <a></a>
    </div>
</div>