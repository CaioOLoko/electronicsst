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

    <h1>Cadastro de Categoria</h1><br>

    <label for="descricao">Descrição:</label> <input type="text" maxlength="30" name="descricao" value="<?=@$categoria['descricao']?>"><br><br>

    <button type="submit">Cadastrar</button>

</form>

