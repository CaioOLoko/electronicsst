<?php

require_once "modelo/produtoModelo.php";

function adicionar($idProduto) {
    // se existir a session carrinho
    if (isset($_SESSION["carrinho"])) {
        // produtos recebe session carrinho, pega o conteúdo dela
        $produtos = $_SESSION["carrinho"];
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
        // session carrinho vai receber o array produtos
        $_SESSION["carrinho"] = $produtos;
    // se não existir a session carrinho
    } else {
        // produtos recebe um array vazio
        $produtos = [];
    }
    // dados recebe o array $produtos
    $dados = $produtos;
    // exibe a página inicial junto aos dados dos produtos
    exibir("carrinho/inicial", $dados);
}

function limparCarrinho() {
    unset($_SESSION['carrinho']);
    redirecionar("compras/listar");
}

function removerProduto($id){
    $produtos = $_SESSION['carrinho'];
    unset($produtos[$id]);
    $_SESSION["carrinho"] = $produtos;
    redirecionar("compras/listar");
}

?>