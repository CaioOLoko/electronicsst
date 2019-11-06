<div class="login">

	<p class="div-p">Acesse sua conta</p>

	<form class="formulario" action="" method="POST">
		<?php if (isset($erro)): ?>
			<div class="erro">
				<p><?= $erro ?></p>
			</div>
		<?php endif; ?>

		<label class="formulario-label" for="email">E-mail:<span>*</span></label>
		<input class="formulario-input" type="text" name="email" id="email">

		<br>

		<label class="formulario-label" for="senha">Senha:<span>*</span></label>
		<input class="formulario-input" type="password" name="senha" id="senha">
		
		<button class="formulario-button" type="submit">Entrar</button>
	</form>

	<p class="link-acesso">Não possui uma conta? <a href="usuario/adicionar">Cadastre-se</a></p>

</div>