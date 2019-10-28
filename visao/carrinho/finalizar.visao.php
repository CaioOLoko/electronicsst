<div class="finalizar-pedido">
	<div class="produto-e-endereco">
		<select class="endereco-usuario">
			<?php foreach($enderecos as $endereco):?>
				<option value="<?=$endereco['idEndereco']?>">
					CEP: <?=$endereco['cep']?><br>
					Logradouro: <?=$endereco['logradouro']." ".$endereco['numero']?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
	<p><?= $quantidade ?> produto(s) <a href="">visualizar produtos</a></p>
	<br>
	<p>Total a pagar: <?= $total?></p>

	<form action="" method="POST" class="cupom">
		<h2>Possui cupom?</h2>
		<input type="text" name="cupom" placeholder="Insira um cupom válido">
		<button type="submit">Verificar</button>
	</form>

		<?php foreach($pagamentos as $pagamento):?>
			<input type="radio" name="pagamento" value="<?=$pagamento['idFormaPagamento']?>"><?=$pagamento['nome']?>&nbsp;&nbsp;&nbsp;
		<?php endforeach;?>
</div>