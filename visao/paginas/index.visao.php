<!--
<div class="welcome">
        <figure>
                <img src="publico/img/slider/1.jpg">
                <img src="publico/img/slider/2.jpg">
                <img src="publico/img/slider/1.jpg">
        </figure>
</div>
-->

<div class="product-list">
    <?php foreach ($produtos as $produto): ?>
        <a href="produto/visualizar/<?= $produto['idProduto'] ?>" class="product-link">
            <div class="product">
                <img src="<?= $produto['imagem'] ?>" class="img-produto-inicial">
                <p class="description-img-inicial"><?= $produto['nome'] ?></p>
                <p class="description-img-inicial">R$ <?= $produto['preco'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>