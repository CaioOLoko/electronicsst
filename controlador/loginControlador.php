<?php

require_once "modelo/usuarioModelo.php";

/** anon */
function index() {
    if (ehPost()) {
        extract($_POST);
        $usuario = getUsuarioByEmailSenha($email, $senha);
        
        if (acessoLogar($usuario)) {
            alert("Bem vindo " . $email);
            
//            if(){
//                
//            }
            
        } else {
            alert("Usuário ou senha inválidos!");
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
