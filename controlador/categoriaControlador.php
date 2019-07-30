<?php

require_once "servico/validacaoServico.php";
require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        $categoria = $_POST["descricao"];
        $errors = array();
        if (validar_quantidade_de_campos($categoria, "Categoria") != NULL) {
            $errors[] = validar_quantidade_de_campos($categoria, "Categoria");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("categoria/formulario", $dados);
        } else {
            $msg = adicionarCategoria($categoria);
            redirecionar("categoria/listarCategoria");
        }
    } else {
        exibir("categoria/formulario");
    }
}

function listarCategoria() {
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}

function ver($id) {
    $dados["categoria"] = pegarCategoriaPorId($id);
    exibir("categoria/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarCategoria($id);
    redirecionar("categoria/listarCategoria");
}

function editar($id) {
    if (ehPost()) {
        $categoria = $_POST["descricao"];
        $errors = array();
        if (validar_quantidade_de_campos($categoria, "Categoria") != NULL) {
            $errors[] = validar_quantidade_de_campos($categoria, "Categoria");
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("categoria/formulario", $dados);
        } else {
            editarCategoria($categoria);
            redirecionar("categoria/listarCategoria");
        }
    } else {
        $dados["categoria"] = pegarCategoriaPorId($id);
        exibir("categoria/formulario", $dados);
    }
}
?>

