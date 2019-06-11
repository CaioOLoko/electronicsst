<?php

require("servico/validacaoServico.php");
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

function ver($id){
    //passa o $id para a função pegarCategoriaPorId do modelo
    $dados["categoria"] = pegarCategoriaPorId($id);
    //chama o arquivo: visao/categoria/visualizar.visao.php
    exibir("categoria/visualizar", $dados);
}

function deletar($id){
    $msg = deletarCategoria($id);
    redirecionar("categoria/listarCategoria");
}

?>

