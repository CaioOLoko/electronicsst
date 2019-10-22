<script>
	function formatar(mascara, documento) {
		var i = documento.value.length;
		var saida = mascara.substring(0, 1);
		var texto = mascara.substring(i)

		if (texto.substring(0, 1) != saida) {
			documento.value += texto.substring(0, 1);
		}

	}
</script>

<div class="cestas-de-produtos">
	<div class="lista-de-produtos">
		<?php
		if (isset($_SESSION["carrinho"])):
			foreach ($produtos as $produto):?>
				<div class="caixa-produto">
					<img class="produto-caixa-imagem" src="<?= $produto['imagem'] ?>">
					<p><?= $produto['nome'] ?></p>
					<strong><p>Preço:<?= $produto['preco'] ?></p></strong>
					<p>Quantidade: <?= $produto["quantidade"] ?></p>
					<a href="compras/removerProduto/<?= $produto['idProduto'] ?>">Remover</a>
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
	</div>
</div>
<a href="compras/finalizar">Finalizar</a><br>
<div>
	<form action="" method="POST">
		<input type="text" name="cep" placeholder="Informe um cep" OnKeyPress="formatar('#####-###', this)" maxlength="9">
		<button type="submit">Vai</button>
	</form>
</div>