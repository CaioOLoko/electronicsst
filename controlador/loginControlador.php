<?php

require_once "modelo/usuarioModelo.php";

/** anon */
function index() {
    if (ehPost()) {
        extract($_POST);
        $usuario = getUsuarioByEmailSenha($email, $senha);
        
        if (acessoLogar($usuario)) {
            // alert("Bem vindo" . $usuario['nome']);
            redirecionar("usuario/visualizar/$usuario[id]");
        } else {
            alert("usuario ou senha invalidos!");
        }
    }
    exibir("login/index");
}

/** anon */
function logout() {
    acessoDeslogar();
    alert("deslogado com sucesso!");
    redirecionar("usuario");
}
