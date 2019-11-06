<div class="header">
	<form method="POST" action="produto/buscar/" class="busca">
		<input class="input-busca" type="search" name="buscar" placeholder="Digite aqui">
		<button class="button-busca" type="submit">Buscar</button>
	</form>

	<div class="logo-store">
		<a href=".">
			<img src="publico/img/header/logo.png" style="width: auto; height: 100px;">
		</a>
	</div>

	<div class="menu">
		<?php if (acessoUsuarioEstaLogado()): ?>
			<a class="menu-link" href="usuario/visualizar/<?= acessoPegarUsuarioLogado() ?>"><p>Perfil</p></a>
			<a class="menu-link" href="login/logout"><p>Logout</p></a>
		<?php else: ?>
			<a class="menu-link" href="login/"><p>Login</p></a>
			<a class="menu-link" href="usuario/adicionar"><p>Cadastro</p></a>
		<?php endif; ?>

		<a class="menu-link" href="compras/"><p>Carrinho</p></a>
	</div>
</div>