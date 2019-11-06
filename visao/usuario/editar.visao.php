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

<div class="edicao">
	<p class="div-p">Atualize</p>

	<form method="POST" action="" class="formulario">
		<label for="nomeUsuario" class="formulario-label">Nome<span>*</span><?php if (isset($erro['nome'])) {echo "(Nome inválido!)";}?></label>
		<input id="nomeUsuario" class="formulario-input" type="text" name="nome" maxlength="60" value="<?= $usuario['nome'] ?>"><br>

		<label for="sobrenomeUsuario" class="formulario-label">Sobrenome<span>*</span><?php if (isset($erro['sobrenome'])) {echo "(Sobrenome inválido!)";}?></label>
		<input id="sobrenomeUsuario" class="formulario-input" type="text" name="sobrenome" maxlength="60" value="<?= $usuario['sobrenome'] ?>"><br>

		<label for="emailUsuario" class="formulario-label">E-mail<span>*</span><?php if (isset($erro['email'])) {echo "(Email inválido!)";}?></label>
		<input id="emailUsuario" class="formulario-input" type="email" name="email" value="<?= $usuario['email'] ?>"><br>

		<label for="senhaUsuario" class="formulario-label">Senha<span>*</span><?php if (isset($erro['senha'])) {echo "(Senha inválida!)";}?></label>
		<input id="senhaUsuario" class="formulario-input" type="password" name="senha" value="<?= $usuario['senha'] ?>"><br>

		<label for="cpfUsuario" class="formulario-label">CPF<span>*</span><?php if (isset($erro['cpf'])) {echo "(CPF inválido!)";}?></label>
		<input id="cpfUsuario" class="formulario-input" type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value="<?= $usuario['cpf'] ?>"><br>

		<label class="formulario-label">Data de Nascimento<span>*</span><?php if (isset($erro['data'])) {echo "(Data inválida!)";}?></label>
		<?php $data = explode('-',$usuario['nascimento']);?>
		<div class="div-select">
			<label class="label-cadastro" for="dia">Dia</label>
			<select class="formulario-select" name="dia" id="dia">
				<option value="<?=$data[2]?>"><?=$data[2]?></option>
				<?php for ($day = 1; $day <= 31; $day++): ?>
					<option value="<?= $day ?>"><?= $day ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="div-select">
			<label class="label-cadastro" for="mes">Mês</label>
			<select class="formulario-select" name="mes" id="mes">
				<option value="<?=$data[1]?>"><?=$data[1]?></option>
				<?php for ($month = 1; $month <= 12; $month ++): ?>
					<option value="<?= $month ?>"><?= $month ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="div-select">
			<label class="label-cadastro" for="ano">Ano</label>
			<select class="formulario-select" name="ano" id="ano">
				<option value="<?=$data[0]?>"><?=$data[0]?></option>
				<?php for ($year = date("Y"); $year >= 1960; $year--): ?>
					<option value="<?= $year ?>"><?= $year ?></option>
				<?php endfor; ?>
			</select>
		</div>

		<label class="formulario-label">Sexo<span>*</span></label>
		<?php if ($usuario['sexo'] == "Masculino"): ?>
			<div class="div-input-radio">
				<input type="radio" name="sexo" value="Masculino" checked id="man">
				<label class="formulario-label" for="man">Masculino</label>
			</div>
			<div class="div-input-radio">
				<input type="radio" name="sexo" value="Feminino" id="woman">
				<label class="formulario-label" for="woman">Feminino</label><br>
			</div>
		<?php else: ?>
			<div class="div-input-radio">
				<input type="radio" name="sexo" value="Masculino" id="man">
				<label class="formulario-label" for="man">Masculino</label>
			</div>
			<div class="div-input-radio">
				<input type="radio" name="sexo" value="Feminino" checked id="woman">
				<label class="formulario-label" for="woman">Feminino</label><br>
			</div>
		<?php endif; ?>

		<button type="submit" class="formulario-button">Alterar</button>
	</form>
</div>