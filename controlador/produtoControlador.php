<?php

require_once "servico/validacaoServico.php";
require_once "servico/uploadServico.php";
require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];

        $imagem_temp_name = $_FILES["imagem"]["tmp_name"];
        $name_imagem = $_FILES["imagem"]["name"];
        $imagem = uploadImagem($imagem_temp_name, $name_imagem);

        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $errors = array();

        if (validar_elementos_obrigatorios($nome_do_produto, "Nome") != NULL) {
            $errors['nome'] = validaNome($nome_do_produto, "Nome");
        }
        //if (validar_elementos_obrigatorios($infoProduto, "Informações do Produto") != NULL) {
        //    $errors['informacoes'] = validar_elementos_obrigatorios($infoProduto, "Informações do Produto");
        //}
        if (validar_elementos_especificos($estoque_minimo, "Estoque Mínimo") != NULL) {
            $errors['estoque_minimo'] = validar_elementos_especificos($estoque_minimo, "Estoque Mínimo");
        }
        if (validar_elementos_especificos($estoque_maximo, "Estoque Máximo") != NULL) {
            $errors['estoque_maximo'] = validar_elementos_especificos($estoque_maximo, "Estoque Máximo");
        }
        if ($categoria == "default") {
            $errors['categoria'] = "Informe uma categoria";
        }

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            $dados["categorias"] = pegarTodasCategorias();
            exibir("produtos/formulario", $dados);
        } else {
            $msg = adicionarProduto($categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $imagem, $estoque_minimo, $estoque_maximo);
            redirecionar("produto/listarProdutos");
        }
    } else {
        $dados = array();
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produtos/formulario", $dados);
    }
}

function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produtos/listar", $dados);
}

function ver($id) {
    $dados["produto"] = pegarProdutoPorId($id);
    exibir("produtos/visualizar", $dados);
}

function deletar($id) {
    deletarProduto($id);
    redirecionar("produto/listarProdutos");
}

function buscar($nome) {
    if (ehPost()) {
        $nome = $_POST['buscar'];
        $dados['categorias'] = pegarTodasCategorias();
        $dados['produtos'] = buscarProdutosPorNome($nome);
        exibir("produtos/listar", $dados);
    }
}

function buscarPorCategoria($idCategoria) {
    $dados['categorias'] = pegarTodasCategorias();
    $dados['produtos'] = buscarProdutoPorIDcategoria($idCategoria);
    exibir("produtos/listar", $dados);
}

function editar($id) {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];

        $imagem_temp_name = $_FILES["imagem"]["tmp_name"];
        $name_imagem = $_FILES["imagem"]["name"];
        $imagem = uploadImagem($imagem_temp_name, $name_imagem);

        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $errors = array();

        if (validar_elementos_obrigatorios($nome_do_produto, "Nome") != NULL) {
            $errors['nome'] = validaNome($nome_do_produto, "Nome");
        }
        if (validar_elementos_obrigatorios($infoProduto, "Informações do Produto") != NULL) {
            $errors['informacoes'] = validar_elementos_obrigatorios($infoProduto, "Informações do Produto");
        }
        if (validar_elementos_especificos($estoque_minimo, "Estoque Mínimo") != NULL) {
            $errors['estoque_minimo'] = validar_elementos_especificos($estoque_minimo, "Estoque Mínimo");
        }
        if (validar_elementos_especificos($estoque_maximo, "Estoque Máximo") != NULL) {
            $errors['estoque_maximo'] = validar_elementos_especificos($estoque_maximo, "Estoque Máximo");
        }
        if ($categoria == "default") {
            $errors['categoria'] = "Informe uma categoria";
        }

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            $dados["categorias"] = pegarTodasCategorias();
            exibir("produtos/formulario", $dados);
        } else {
            $msg = editarProduto($id, $categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $imagem, $estoque_minimo, $estoque_maximo);
            redirecionar("produto/listarProdutos");
        }
    } else {
        $dados["categorias"] = pegarTodasCategorias();
        $dados["produto"] = pegarProdutoPorId($id);
        exibir("produtos/formulario", $dados);
    }
}

?>