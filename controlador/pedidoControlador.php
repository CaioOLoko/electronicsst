<?php

require_once 'modelo/cupomModelo.php';
require_once 'modelo/produtoModelo.php';
require_once 'modelo/enderecoModelo.php';
require_once 'modelo/FormaPagamentoModelo.php';

function salvaPedido(){
    $produtos = $_SESSION['carrinho'];

    echo "<pre>";
    print_r($produtos);
    echo "</pre>";

    if(ehPost()){
        $cupom = $_POST['cupom'];
        $pagamento = $_POST['pagamento'];
    } else {
        exibir("pedido/index");
    }
}