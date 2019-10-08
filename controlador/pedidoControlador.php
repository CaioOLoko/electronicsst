<?php

require_once 'modelo/cupomModelo.php';
require_once 'modelo/produtoModelo.php';
require_once 'modelo/enderecoModelo.php';
require_once 'modelo/FormaPagamentoModelo.php';

function index()
{
    $dados = array();
    $dados['pedidos'] = allPedido();
    exibir("pedido/index", $dados);
}

function salvaPedido()
{
    $produtos = $_SESSION['carrinho'];

    echo "<pre>";
    print_r($produtos);
    echo "</pre>";

    if(ehPost()){
        $cupom = $_POST['cupom'];
        $pagamento = $_POST['pagamento'];
    } else {
        $dados = array();
        $dados['pagamento'] = allPagamento();
        exibir("pedido/index", $dados);
    }
}
