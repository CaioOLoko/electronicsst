<?php

if (isset($produtos)) {
    $produtos = $_SESSION["carrinho"];
    echo "<pre>";
    print_r($produtos);
} else {
    echo "Carrinho vazio";
}
