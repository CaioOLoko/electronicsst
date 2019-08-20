<?php
if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<style type="text/css">
    .tabela {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
    }
</style>
<form action="" method="POST">

    <h1>Cadastro de Cupom</h1><br>

    <label for="nomecupom">Nome:</label> <input type="text" maxlength="60" name="nomecupom" value="<?= @$cupom['nomecupom'] ?>"><br><br>
    <label for="desconto">Desconto:</label> <input type="text" maxlength="11" name="desconto" value="<?= @$cupom['desconto'] ?>"><br><br>

    <button type="submit">Cadastrar</button>

</form>

