<?php

require_once "modelo/produtoModelo.php";

function adicionar($idProduto) {

    // se existir a session carrinho
    if (isset($_SESSION["carrinho"])) {

        // produtos recebe session carrinho, pega o conteúdo dela
        $produtos = $_SESSION["carrinho"];

        // se não existir a session carrinho
    } else {

        // produtos recebe um array vazio
        $produtos = [];
    }

    // produtos na posição dinâmica recebe o produto
    $produtos[] = pegarProdutoPorId($idProduto);

    // salva todos os produtos na session carrinho
    $_SESSION["carrinho"] = $produtos;

    // redirecionar para a função de exibição de produtos
    redirecionar("compras/listar");
}

function listar() {
    // se existir a session carrinho
    if (isset($_SESSION["carrinho"])) {

        // produtos recebe session carrinho, pega o conteúdo dela
        $produtos = $_SESSION["carrinho"];

        // a
        echo "<pre>";
        print_r($produtos);
        $dados = $produtos;
    } else {
        exibir("carrinho/inicial", $dados);
    }
}

function remover($idProduto) {
    
}

?>