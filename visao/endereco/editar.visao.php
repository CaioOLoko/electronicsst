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
    <h1>Edição de Endereço</h1>
    <label for="logradouro">Logradouro:</label>
    <input type="text" id="logradouro" name="logradouro" value="<?= @$endereco['logradouro'] ?>">

    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" value="<?= @$endereco['numero'] ?>">

    <label for="complemento">Complemento:</label>
    <input type="text" id="complemento" name="complemento" value="<?= @$endereco['complemento'] ?>">

    <label for="bairro">Bairro:</label>
    <input type="text" id="bairro" name="bairro" value="<?= @$endereco['bairro'] ?>">

    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" value="<?= @$endereco['cidade'] ?>">

    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" OnKeyPress="formatar('#####-###', this)" value="<?= @$endereco['cep'] ?>">

    <button type="submit">Enviar</button>

</form>