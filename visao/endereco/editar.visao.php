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

<form action="" method="POST" class="addEndereco">
	<p class="div-p">Editar</p>
	<label class="formulario-label" for="logradouro">Logradouro:<?php if(isset($erro['logradouro'])){echo " (Logradouro inválido!)";}?></label>
	<input class="formulario-input" type="text" id="logradouro" name="logradouro" value="<?= $endereco['logradouro'] ?>"><br>

	<label class="formulario-label" for="numero">Número:<?php if(isset($erro['numero'])){echo " (Número inválido!)";}?></label>
	<input class="formulario-input" type="text" id="numero" name="numero" value="<?= $endereco['numero'] ?>"><br>

	<label class="formulario-label" for="complemento">Complemento:</label>
	<input class="formulario-input" type="text" id="complemento" name="complemento" value="<?= $endereco['complemento'] ?>"><br>

	<label class="formulario-label" for="bairro">Bairro:<?php if(isset($erro['bairro'])){echo " (Bairro inválido!)";}?></label>
	<input class="formulario-input" type="text" id="bairro" name="bairro" value="<?= $endereco['bairro'] ?>"><br>

	<label class="formulario-label" for="cidade">Cidade:<?php if(isset($erro['cidade'])){echo " (Cidade inválida!)";}?></label>
	<input class="formulario-input" type="text" id="cidade" name="cidade" value="<?= $endereco['cidade'] ?>"><br>

	<label class="formulario-label" for="cep">CEP:<?php if(isset($erro['cep'])){echo " (CEP inválido!)";}?></label> 
	<input class="formulario-input" type="text" id="cep" name="cep" OnKeyPress="formatar('#####-###', this)" value="<?= $endereco['cep'] ?>"><br>

	<button class="formulario-button" type="submit">Enviar</button>

</form>