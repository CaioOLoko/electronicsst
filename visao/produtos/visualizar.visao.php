<div class="simple-description">
    <div class="prod-image">
        <img class="prod-img" src="<?= $produto["imagem"] ?>">
    </div>
    <div class="prod-description">
        <h2 class="infoprincipal"><?= $produto["nomeproduto"] ?></h2>
        <h4 class="categoriaproduto">Categoria: <?= $produto['nomecategoria'] ?></h4>
        <h4 class="codigoproduto">(Cód. <?= $produto["idproduto"] ?>)</h4>
        <h3 class="infoprincipal">R$ <?= number_format($produto['preco'], 2) ?></h3>

        <a class="send-product" href="compras/adicionar/<?= $produto['idproduto'] ?>">ADICIONAR AO CARRINHO</a>

        <button class="accordion">INFORMAÇÕES DO PRODUTO</button>
        <div class="panel">
            <p><?= $produto["descricao"] ?></p>
        </div>
    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener
                ("click", function ()
                {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                }
                );
    }
</script>