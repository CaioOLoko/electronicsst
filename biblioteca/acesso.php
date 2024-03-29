<?php

define('ACESSO', true);

function acessoLogar($usuario) {
    if(!empty($usuario)) {
        $_SESSION["acesso"] = array(
            "nome" =>   $usuario["nome"],
            "email" =>  $usuario["email"], 
            "tipo" =>   $usuario["tipo"],
            "id" =>     $usuario["idUsuario"]
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
        return $_SESSION["acesso"]["tipo"];
    }
}

function acessoPegarUsuarioLogado() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["id"];
    }   
}

function acessoPegarNomeUsuario() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["nome"];
    }   
}