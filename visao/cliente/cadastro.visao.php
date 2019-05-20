<style type="text/css">
.tabela {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
}
</style>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
<form action="" method="POST">

    <h1>Cadastre-se</h1>

    E-mail: <input type="text" name="email"><br><br>
    Senha: <input type="password" name="senha" maxlength="30"><br><br>
    CPF: <input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"><br><br>
    Nome: <input type="text" name="nome"><br><br>
    Sobrenome: <input type="text" name="sobrenome"><br><br>
    Data de Nascimento: <input type="text" name="data_de_nascimento"><br><br>
    Sexo:<br><br>
    Masculino<input type="radio" name="sexo" value="Masculino">
    Feminino<input type="radio" name="sexo" value="Feminino"><br><br>
    Telefone: <input type="text" name="telefone">
    <button type="submit">Cadastrar</button>

</form>

