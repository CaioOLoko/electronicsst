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

<div class="ficha-tecnica">
    <h1 align="left">FICHA TÉCNICA</h1>
    <div class="ficha-caracteristica">
        <div class="caracteristica">
            <p class="caracteristica-especifica">Código</p>
            <p class="caracteristica-especifica">Código de barras</p>
            <p class="caracteristica-especifica">Marca</p>
            <p class="caracteristica-especifica">Modelo</p>
            <p class="caracteristica-especifica">Cor</p>
            <p class="caracteristica-especifica">Tipo de Chip</p>
            <p class="caracteristica-especifica">Quantidade de Chips</p>
            <p class="caracteristica-especifica">Memória Interna</p>
            <p class="caracteristica-especifica">Processador</p>
            <p class="caracteristica-especifica">Tamanho do Display</p>	
            <p class="caracteristica-especifica">Sistema Operacional</p>						
        </div>
        <div class="caracteristica">
            <p class="caracteristica-especifica"><?= $produto['idproduto'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['cod_barras'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['marca'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['modelo'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['cor'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['tipo_chip'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['quant_chip'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['mem_interna'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['processador'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['display'] ?></p>
            <p class="caracteristica-especifica"><?= $produto['so'] ?></p>
        </div>
    </div>
</div>