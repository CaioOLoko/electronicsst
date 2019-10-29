<?php

require_once "modelo/usuarioModelo.php";

/** anon */
function index() {
    if (ehPost()) {
        extract($_POST);
        $usuario = getUsuarioByEmailSenha($email, $senha);

        if (acessoLogar($usuario)) {

            if (isset($_SESSION['verificar']) && $_SESSION['verificar'] == false) {
                
            }
            $id = $usuario['idUsuario'];
            redirecionar("usuario/visualizar/$id");
        } else {
            alert("Usuário ou senha inválidos!");
        }
    } else {
        exibir("login/index");
    }
}

/** anon */
function logout() {
    acessoDeslogar();
    alert("deslogado com sucesso!");
    redirecionar("usuario");
}

/** anon */
function index_2() {
    if (ehPost()) {
        extract($_POST);
        $usuario = getUsuarioByEmailSenha($email, $senha);

        if (acessoLogar($usuario)) {
            $id = $usuario['idUsuario'];

            if (acessoPegarPapelDoUsuario($usuario) == 'admin') {
                redirecionar("usuario/");
            } else {
                redirecionar("usuario/visualizar/$id");
            }
        } else {
            $dados = array();
            $dados['errors'] = "Email ou senha inválidos";
            exibir("login/index", $dados);
        }
    }
    exibir("login/index");
}
