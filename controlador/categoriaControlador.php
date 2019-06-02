<?php

require("servico/validacaoServico.php");
require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        $codCategoria = $_POST["codigo"];
        $categoria = $_POST["categoria"];

        $errors = array();
        
        if (validar_elementos_especificos($codCategoria, "Código") != NULL) {
            $errors[] = validar_elementos_especificos($codCategoria, "Código");
        }
        if (validar_elementos_obrigatorios($categoria, "Categoria") != NULL) {
            $errors[] = validar_elementos_obrigatorios($categoria, "Categoria");
        }

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("categoria/formulario", $dados);
        } else {
            $msg = adicionarCategoria($codCategoria, $categoria);
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
?>

