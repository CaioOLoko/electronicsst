<html>
    <head>
        <title>Electronic's ST</title>
        <meta charset="utf-8">
        <base href="<?= URL_BASE ?>">
        <link rel="shortcut icon" type="image/x-png" href="./publico/img/user/user.png">
        <link rel="stylesheet" href="./publico/css/app.css">
    </head>
    <body class="container">
        <?php
        /*
          http://tiagomatos.com/blog/dica-sobre-a-variavel-global-server-do-php
          https://www.php.net/manual/pt_BR/reserved.variables.server.php
         */
        if (($_SERVER['PHP_SELF'] != '/electronicsst/index.php/cliente/adicionar') && ($_SERVER['PHP_SELF'] != '/electronicsst/index.php/login/')) {
            require('cabecalho.php');
        } else {
            require('cabecalho_aux.php');
        }
        ?>
        <main class="container" id="content">
            <?php
            require $viewFilePath;
            ?>
        </main>
        <?php
        if (($_SERVER['PHP_SELF'] != '/electronicsst/index.php/cliente/adicionar') && ($_SERVER['PHP_SELF'] != '/electronicsst/index.php/login/')) {
            require('rodape.php');
        }
        ?>
    </body>
</html>