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

	<form action="" method="POST" class="cupom">
		<h2>Possui cupom?</h2>
		<input type="text" name="cupom" placeholder="Insira um cupom válido">
		<button type="submit">Verificar</button>
	</form>

	<form class="pagamento">
		<?php foreach($pagamentos as $pagamento):?>
			<a href=""><?=$pagamento['idFormaPagamento']?> - <?=$pagamento['nome']?></a><br>
		<?php endforeach;?>
	</div>
</div>