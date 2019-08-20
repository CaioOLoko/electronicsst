<?php
if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<style type="text/css">
    .tabela{
        font-family: 'Verdana', 'Arial', 'Helvetica', sans-serif;
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
    <h1>Cadastro de Endereço</h1><br>
    <label for="logradouro">Logradouro:</label><br>
    <input type="text" name="logradouro" style="width:250px" value="<?= @$endereco['logradouro'] ?>"><br><br>

    <label for="numero">Número:</label><br>
    <input type="text" name="numero" style="width:250px" value="<?= @$endereco['numero'] ?>"><br><br>

    <label for="complemento">Complemento:</label><br>
    <input type="text" name="complemento" style="width:250px" value="<?= @$endereco['complemento'] ?>"><br><br>

    <label for="bairro">Bairro:</label><br>
    <input type="text" name="bairro" style="width:250px" value="<?= @$endereco['bairro'] ?>"><br><br>

    <label for="cidade">Cidade:</label><br>
    <input type="text" name="cidade" value="<?= @$endereco['cidade'] ?>"><br><br>

    <label for="cep">CEP:</label><br>
    <input type="text" name="cep" OnKeyPress="formatar('#####-###', this)" value="<?= @$endereco['cep'] ?>"><br><br>

    <button type="submit">Enviar</button>

</form>

