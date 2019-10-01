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

<div class="welcome-user">
    <img src="publico/img/user/user.png" style="width: auto; height: 100%;">
    <h1>Modifique seus dados</h1>
</div>
<form method="POST" action="" class="form-user">
    <label class="label-user">Nome<span>*</span></label><br>
    <input class="input-user" type="text" name="nomeusuario" maxlength="60" required="" value="<?= $cliente['nomeusuario'] ?>"><br>

    <label class="label-user">Sobrenome<span>*</span></label><br>
    <input class="input-user" type="text" name="sobrenomeusuario" maxlength="60" required="" value="<?= $cliente['sobrenomeusuario'] ?>"><br>

    <label class="label-user">E-mail<span>*</span></label><br>
    <input class="input-user" type="email" maxlength="60" name="email" required="" value="<?= $cliente['email'] ?>"><br>

    <label class="label-user">Senha<span>*</span></label><br>
    <input class="input-user" type="password" maxlength="30" name="senha" required="" value="<?= $cliente['senha'] ?>"><br>

    <label class="label-user">CPF<span>*</span></label><br>
    <input class="input-user" type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required="" value="<?= $cliente['cpf'] ?>"><br>

    <label class="label-user">Data de Nascimento<span>*</span></label><br>
    <?php
        $data = explode('-', $cliente['datadenascimento']);
    ?>
    <div class="birthday-user">
        <select class="parameters" name="dia">
            <option value="<?= $data[2] ?>"><?= $data[2] ?></option>
            <?php for ($day = 1; $day <= 31; $day++): ?>
                <option value="<?= $day ?>"><?= $day ?></option>
            <?php endfor; ?>
        </select>
        <select class="parameters" name="mes">
            <option value="<?= $data[1] ?>"><?= $data[1] ?></option>
            <?php for ($month = 1; $month <= 12; $month ++): ?>
                <option value="<?= $month ?>"><?= $month ?></option>
            <?php endfor; ?>
        </select>
        <select class="parameters" name="ano">
            <option value="<?= $data[0] ?>"><?= $data[0] ?></option>
            <?php for ($year = date("Y"); $year >= 1960; $year--): ?>
                <option value="<?= $year ?>"><?= $year ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <label class="label-user">Sexo<span>*</span></label>
    <?php if ($cliente['sexo'] == "Masculino"): ?>
        <div class="sex-user">
            <div class="gender-user">
                <input type="radio" name="sexo" value="Masculino" checked="" id="man">
                <label class="label-gender-user" for="man">Masculino</label>
            </div>
            <div class="gender-user">
                <input type="radio" name="sexo" value="Feminino" id="woman">
                <label class="label-gender-user" for="woman">Feminino</label><br>
            </div>
        </div>
    <?php else: ?>
        <div class="sex-user">
            <div class="gender-user">
                <input type="radio" name="sexo" value="Masculino" id="man">
                <label class="label-gender-user" for="man">Masculino</label>
            </div>
            <div class="gender-user">
                <input type="radio" name="sexo" value="Feminino" checked="" id="woman">
                <label class="label-gender-user" for="woman">Feminino</label><br>
            </div>
        </div>
    <?php endif; ?>

    <button type="submit" class="submit-button-user-register">Alterar</button>
</form>