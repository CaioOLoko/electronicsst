<div class="header">
    <div class="est-logo">
        <a href="." class="title-store"><h1>Electronic's ST</h1></a>
    </div>
    <div class="search-div">
        <form method="POST" action="produto/buscar/" class="search-form">
            <input id="busca" type="search" name="buscar" placeholder="Buscar produto" class="header-search-input">
            <button type="submit" class="header-search-button"><img src="publico/img/header/lupa.png" class="img-search"></button>
        </form>
    </div>
    <?php if (acessoUsuarioEstaLogado()): ?>
        <div class="dropdown">
            <button class="dropbtn">Bem vindo <br><?= acessoPegarUsuarioLogado() ?></button>
            <div class="dropdown-content">
                <a href="usuario/visualizar/<?= acessoPegarUsuarioLogado() ?>"><h3>Minha Conta</h3></a>
                <a href="login/logout"><h3>Sair</h3></a>
            </div>
        </div>  

    <?php else: ?>
        <div class="dropdown">
            <button class="dropbtn">Login ou<br>Cadastro</button>
            <div class="dropdown-content">
                <a href="login/"><h3>Login</h3></a>
                <a href="usuario/adicionar"><h3>Cadastro</h3></a>
            </div>
        </div>
    <?php endif; ?>
    <div class="shop-car">
        <a href="compras/">
            <img src="publico/img/header/shopping-cart.png" class="shopping-cart-image">
        </a>
    </div>
</div>