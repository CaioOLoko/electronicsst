<form action="" method="POST">

    <h1>Edição de Cupom</h1><br>

    <label for="nomecupom">Nome:</label> 
    <input type="text" maxlength="60" name="nome" value="<?= $cupom['nome'] ?>"><br><br>
    
    <label for="desconto">Desconto:</label>
    <input type="text" maxlength="11" name="desconto" value="<?= $cupom['desconto'] ?>"><br><br>

    <button type="submit">Atualizar</button>

</form>