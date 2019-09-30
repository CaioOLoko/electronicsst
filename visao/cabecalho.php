<div class="header">
	<div class="div-button">
		<button class="button-div-menu"><img style="height: 80%; width: 80%; " src="publico/img/header/more.png"></button>
		<div class="menu-auxiliar">
			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Categorias</button>
				<div class="menu-auxiliar-topico-div">
					<a href="categoria/adicionar">Adicionar</a>
					<a href="categoria/">Listar</a>
				</div>
			</div>

			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Clientes</button>
				<div class="menu-auxiliar-topico-div">
					<a href="usuario/adicionar">Adicionar</a>
					<a href="usuario/">Listar</a>
				</div>
			</div>

			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Cupons</button>
				<div class="menu-auxiliar-topico-div">
					<a href="cupom/adicionar">Adicionar</a>
					<a href="cupom/">Listar</a>
				</div>
			</div>

			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Endereços</button>
				<div class="menu-auxiliar-topico-div">
					<a href="endereco/">Listar</a>
				</div>
			</div>

			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Pagamentos</button>
				<div class="menu-auxiliar-topico-div">
					<a href="FormaPagamento/adicionar">Adicionar</a>
					<a href="FormaPagamento/">Listar</a>
				</div>
			</div>

			<div class="menu-auxiliar-topico">
				<button class="menu-auxiliar-topico-button">Produtos</button>
				<div class="menu-auxiliar-topico-div">
					<a href="produto/adicionar">Adicionar</a>
					<a href="produto/">Listar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="est-logo">
		<a href="." class="title-store"><h1>Electronic's ST</h1></a>
	</div>
	<div class="search-div">
		<form method="POST" action="produto/buscar/" class="search-form">
			<input id="busca" type="search" name="buscar" placeholder="Buscar produto" class="header-search-input">
			<button type="submit" class="header-search-button"><img src="publico/img/header/lupa.png" class="img-search"></button>
		</form>
	</div>
	<?php if(acessoUsuarioEstaLogado()): ?>
		<div class="">
			<p style="color: #FFFFFF;">Bem vindo <?=acessoPegarUsuarioLogado()?></p>
		</div>

		<div class="">
			<a style="color: #FFFFFF;" href="login/logout">Sair</a>
		</div>
	<?php else: ?>
		<div class="dropdown">
			<button class="dropbtn">Login ou<br>Cadastro</button>
			<div class="dropdown-content">
				<a href="login/"><h3>Login</h3></a>
				<a href="usuario/adicionar"><h3>Cadastro</h3></a>
			</div>
		</div>
	<?php endif;?>
	<div class="shop-car">
		<a href="compras/">
			<img src="publico/img/header/shopping-cart.png" class="shopping-cart-image">
		</a>
	</div>
</div>