<?php

define('ACESSO', true);

function acessoLogar($usuario) {
    if(!empty($usuario)) {
        $_SESSION["acesso"] = array(
            "email" => $usuario["email"], 
            "tipousuario" => $usuario["tipousuario"]
        );
        return true; 
    }
    return false;
}

function acessoDeslogar() {
    if (isset($_SESSION["acesso"])) {
        $_SESSION["acesso"] = null;
        unset($_SESSION["acesso"]);
    }
}

function acessoUsuarioEstaLogado() {
    return isset($_SESSION["acesso"]);
}

function acessoPegarPapelDoUsuario() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["tipousuario"];
    }
}

function acessoPegarUsuarioLogado() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["email"];
    }   
}
