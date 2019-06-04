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

    <h1>Cadastre-se</h1>

    <label for="email">E-mail:</label> <input type="text" name="email"><br><br>
    <label for="senha">Senha:</label> <input type="password" name="senha" maxlength="30"><br><br>
    <label for="cpf">CPF:</label> <input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"><br><br>
    <label for="nome">Nome:</label> <input type="text" name="nome"><br><br>
    <label for="sobrenome">Sobrenome:</label> <input type="text" name="sobrenome"><br><br>
    <label for="data_de_nascimento">Data de Nascimento:</label> <input type="date" name="data_de_nascimento"><br><br>
    <label for="sexo">Sexo:</label><br><br>
    Masculino<input type="radio" name="sexo" value="Masculino" checked="checked">
    Feminino<input type="radio" name="sexo" value="Feminino"><br><br>
    <label for="telefone">Telefone:</label> <input type="text" name="telefone">
    <button type="submit">Cadastrar</button>

</form>