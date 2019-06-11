<?php

require("servico/validacaoServico.php");
require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";

function visualizar() {
    $loja = array();
    $loja["produto"] = "Galaxy Note 9";
    $loja["descricao"] = "O Samsung Galaxy Note 9 é um dos smartphones Android 
        mais avançados e completos que existem em circulação. Tem um grande 
        display de 6.4 polegadas e uma resolução de 2960x1440 pixels que é uma 
        das mais altas atualmente em circulação. As funcionalidades oferecidas 
        pelo Samsung Galaxy Note 9 são muitas e inovadoras. Começando pelo LTE 
        4G que permite a transferência de dados e excelente navegação na internet. 
        Enfatizamos a excelente memória interna de 128 GB com a possibilidade de 
        expansão. Câmera discreta de 12 megapixel mas que permite ao Samsung 
        Galaxy Note 9 tirar fotos de boa qualidade com uma resolução de 4290x2800 
        pixel e gravar vídeos em 4K a espantosa resolução de 3840x2160 pixels.";
    $loja["preco"] = "R$ 5.499,00";

    exibir("produtos/visualizar", $loja);
}

function adicionar() {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];
        $imagem = $_POST["imagem"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $errors = array();

        if (validar_elementos_obrigatorios($nome_do_produto, "Nome") != NULL) {
            $errors[] = validar_elementos_obrigatorios($nome_do_produto, "Nome");
        }
        if (validar_elementos_obrigatorios($preco_do_produto, "Preço") != NULL) {
            $errors[] = validar_elementos_obrigatorios($preco_do_produto, "Preço");
        }
        if (validar_elementos_obrigatorios($infoProduto, "Informações do Produto") != NULL) {
            $errors[] = validar_elementos_obrigatorios($infoProduto, "Informações do Produto");
        }

        if (validar_elementos_especificos($estoque_minimo, "Estoque Mínimo") != NULL) {
            $errors[] = validar_elementos_especificos($estoque_minimo, "Estoque Mínimo");
        }
        if (validar_elementos_especificos($estoque_maximo, "Estoque Máximo") != NULL) {
            $errors[] = validar_elementos_especificos($estoque_maximo, "Estoque Máximo");
        }

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("produtos/formulario", $dados);
        } else {
            $msg = adicionarProduto($categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $imagem, $estoque_minimo, $estoque_maximo);
            redirecionar("produto/listarProdutos");
        }
    } else {
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

function deletar($id){
    $msg = deletarProduto($id);
    redirecionar("produto/listarProdutos");
}

?>