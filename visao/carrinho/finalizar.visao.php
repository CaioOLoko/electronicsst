<div class="finalizar-pedido">
	<div class="produto-e-endereco">
		<h3><?=acessoPegarNomeUsuario()?></h3><br>
		<h3>endereço de entrega</h3>
		<select class="endereco-usuario">
			<?= $usuario?>
			<?php foreach($enderecos as $endereco):?>
				<option value="<?=$endereco['idEndereco']?>">
					<?=$endereco['logradouro'].", ".$endereco['numero']?>
					<?= $endereco['bairro']?>
					<?= $endereco['cidade']?>
					CEP <?=$endereco['cep']?>
				</option>
			<?php endforeach;?>
		</select>
		<p><?= $quantidade ?> produto(s) <a href="" style="text-decoration: underline;">visualizar produtos</a></p>
		<p>frete para <?=$endereco['cidade']?></p>
		<p>Subtotal: <?= $subtotal?></p>
		<br>
		<p>Total a pagar: <?= $total?></p><br><br>
	</div>
	<form action="" method="POST" class="cupom">
		<h3>Possui cupom?</h3><br>
		<label>Digite o código do seu cupom ou vale </label><input type="text" name="cupom" placeholder="Insira um cupom válido">
		<button type="submit">Aplicar</button>
	</form>
	<div>
		<br><h3>formas de pagamento</h3>
		<select>
			<?php foreach($pagamentos as $pagamento):?>
				<option value="<?=$pagamento['idFormaPagamento']?>">
					<?=$pagamento['nome']?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
</div>