<?php

require_once "servico/validacaoServico.php";
require_once "modelo/FormaPagamentoModelo.php";

function adicionar() {
    if (ehPost()) {
        $descricao = $_POST["descricao"];
        $errors = array();
        if (validar_quantidade_de_campos($descricao, "Forma de Pagamento") != NULL) {
            $errors[] = validar_quantidade_de_campos($descricao, "Forma de Pagamento");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("FormaPagamento/formulario", $dados);
        } else {
            $msg = adicionarFormaPagamento($descricao);
            redirecionar("FormaPagamento/listarFormaPagamento");
        }
    } else {
        exibir("FormaPagamento/formulario");
    }
}

function listarFormaPagamento() {
    $dados = array();
    $dados["formaspagamentos"] = pegarTodasFormasPagamentos();
    exibir("FormaPagamento/listar", $dados);
}

function ver($id) {
    $dados["formapagamento"] = pegarFormaPagamentoPorId($id);
    exibir("FormaPagamento/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarFormaPagamento($id);
    redirecionar("FormaPagamento/listarFormaPagamento");
}

function editar($id) {
    if (ehPost()) {
        $descricao = $_POST["descricao"];
        $errors = array();
        if (validar_quantidade_de_campos($descricao, "Forma de Pagamento") != NULL) {
            $errors[] = validar_quantidade_de_campos($descricao, "Forma de Pagamento");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("FormaPagamento/formulario", $dados);
        } else {
            editarFormaPagamento($id, $descricao);
            redirecionar("FormaPagamento/listarFormaPagamento");
        }
    } else {
        $dados["formapagamento"] = pegarFormaPagamentoPorId($id);
        exibir("FormaPagamento/formulario", $dados);
    }
}
?>