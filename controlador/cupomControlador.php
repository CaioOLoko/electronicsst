<?php

require_once "servico/validacaoServico.php";
require_once "modelo/cupomModelo.php";

function adicionar() {
    if (ehPost()) {

        $nomecupom = $_POST["nomecupom"];
        $desconto = $_POST["desconto"];

        $errors = array();
        if (validar_quantidade_de_campos($nomecupom, "Cupom") != NULL) {
            $errors[] = validar_quantidade_de_campos($nomecupom, "Cupom");
        }
        if (validar_elementos_especificos($desconto, "Desconto") != NULL) {
            $errors[] = validar_elementos_especificos($desconto, "Desconto");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("cupom/formulario", $dados);
        } else {
            $msg = adicionarCupom($nomecupom, $desconto);
            redirecionar("cupom/listarCupom");
        }
    } else {
        exibir("cupom/formulario");
    }
}

function listarCupom() {
    $dados = array();
    $dados["cupons"] = pegarTodosCupons();
    exibir("cupom/listar", $dados);
}

function ver($id) {
    $dados["cupom"] = pegarCupomPorId($id);
    exibir("cupom/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarCupom($id);
    redirecionar("cupom/listarCupom");
}

function editar($id) {
    if (ehPost()) {

        $nomecupom = $_POST["nomecupom"];
        $desconto = $_POST["desconto"];

        $errors = array();
        if (validar_quantidade_de_campos($nomecupom, "Cupom") != NULL) {
            $errors[] = validar_quantidade_de_campos($nomecupom, "Cupom");
        }
        if (validar_elementos_especificos($desconto, "Desconto") != NULL) {
            $errors[] = validar_elementos_especificos($desconto, "Desconto");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("cupom/formulario", $dados);
        } else {
            editarCupom($id, $nomecupom, $desconto);
            redirecionar("cupom/listarCupom");
        }
    } else {
        $dados["cupom"] = pegarCupomPorId($id);
        exibir("cupom/formulario", $dados);
    }
}
?>

