<!--Para incluir o cabeçalho no seu site você precisa realizar a requisição deste arquivo `template.php`-->
<!-- <nav>
        <ul>
                <li><a href="./">Principal</a></li>
                <li><a href="./usuario">Usuario</a></li>
<?php /* if(acessoUsuarioEstaLogado()): ?>
  <li>Bem vindo <?=acessoPegarUsuarioLogado()?></li>
  <li><a href="./login/logout">Sair</a></li>
  <?php else: ?>
  <li><a href="./login">Entrar</a></li>
  <?php endif; */ ?>
        </ul>
</nav> -->
<div class="header">
    <div class="est-logo">
        <a href=".">
            <h1 class="title-store">Electronic's ST</h1>
        </a>
    </div>
    <div class="search-div">
        <form method="POST" action="produto/buscar/" class="search-form">
            <input id="busca" type="search" name="buscar" placeholder="Buscar produto" class="header-search-input">
            <button type="submit" class="header-search-button"><img src="publico/img/header/lupa.png" class="img-search"></button>
        </form>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Login ou<br>Cadastro</button>
        <div class="dropdown-content">
            <a href="login/"><h3>Login</h3></a>
            <a href="cliente/adicionar"><h3>Cadastro</h3></a>
        </div>
    </div>
    <div class="shop-car">
        <a href="compras/listar">
            <img src="publico/img/header/shopping-cart.png" class="shopping-cart-image">
        </a>
    </div>
</div>