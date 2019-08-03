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
<form action="" method="POST">

    <h1>Cadastre-se</h1><br>
    <label for="nome">Nome:</label><br> <input type="text" name="nomeusuario" maxlength="60" style="width:250px" value="<?= @$cliente['nomeusuario'] ?>"><br><br>
    <label for="sobrenome">Sobrenome:</label><br> <input type="text" name="sobrenomeusuario" maxlength="60" style="width:250px" <?= @$cliente['sobrenomeusuario'] ?>><br><br>
    <label for="email">E-mail:</label><br> <input type="text" name="email" maxlength="60" style="width:250px" <?= @$cliente['email'] ?>><br><br>
    <label for="senha">Senha:</label><br> <input type="password" name="senha" maxlength="30" style="width:250px" <?= @$cliente['senha'] ?>><br><br>
    <label for="cpf">CPF:</label><br> <input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" <?= @$cliente['cpf'] ?>><br><br>
    <label for="data_de_nascimento">Data de Nascimento:</label><br> <input type="date" name="datadenascimento" maxlength="10" <?= @$cliente['datadenascimento'] ?>><br><br>
    <label for="sexo">Sexo:</label><br><br>
    <?php if (isset($cliente) && $cliente['sexo'] == "Masculino"): ?>  
        <input type="radio" name="sexo" value="Masculino" checked="checked"><label>&nbsp;Masculino&nbsp;&nbsp;&nbsp;</label> 
        <input type="radio" name="sexo" value="Feminino"><label>&nbsp;Feminino</label><br><br>
    <?php else: ?>
        <input type="radio" name="sexo" value="Masculino"><label>&nbsp;Masculino&nbsp;&nbsp;&nbsp;</label> 
        <input type="radio" name="sexo" value="Feminino" checked="checked"><label>&nbsp;Feminino</label><br><br>
    <?php endif; ?>
    <label for="tipousuario">Tipo de Usuário:</label><br><br>
    <?php if (isset($cliente) && $cliente['tipousuario'] == "Cliente"): ?> 
        <input type="radio" name="tipousuario" value="Cliente" checked="checked"><label>&nbsp;Cliente&nbsp;&nbsp;&nbsp;</label> 
        <input type="radio" name="tipousuario" value="Administrador"><label>&nbsp;Administrador</label> <br><br>
    <?php else: ?>
        <input type="radio" name="tipousuario" value="Cliente" checked="checked"><label>&nbsp;Cliente&nbsp;&nbsp;&nbsp;</label> 
        <input type="radio" name="tipousuario" value="Administrador"><label>&nbsp;Administrador</label> <br><br>
    <?php endif; ?>
    <button type="submit">Cadastrar</button>

</form>