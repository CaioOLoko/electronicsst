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
                <p class="description-img-inicial"><?= $produto['nomeproduto'] ?></p>
                <p class="description-img-inicial">R$ <?= $produto['preco'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php
    $total_registro_pagina = "20";
    $busca = allProduto();

    $pagina = $_GET['pagina'];
    if (!$pagina) {
        $pagina_corrente = "1";
    } else {
        $pagina_corrente = $pagina;
    }

    $inicio = $pagina_corrente - 1;
    $inicio *= $total_registro_pagina;

    $limite = mysql_query("$busca LIMIT $inicio,$total_registro_pagina");
    
?>

<div>
    <a href="">Anterior</a>
    &nbsp;|&nbsp;
    <a href="">Próximo</a>
</div>