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

    <h1>Cadastro de Forma de Pagamento</h1><br>

    <label for="descricao">Descrição:</label><br>
    <input type="text" maxlength="45" name="descricao" style="width:250px" value="<?= @$formapagamento['descricao'] ?>"><br><br>

    <button type="submit">Cadastrar</button>

</form>
