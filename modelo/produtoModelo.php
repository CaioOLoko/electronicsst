<?php

function adicionarProduto($codProduto,$categoria,$nome_do_produto,$preco_do_produto,$infoProduto,$codDeBarras,$marca,$memoria,$processador,$polegadaTela,$SistOper){
    $sql = "INSERT INTO produto(codProduto, categoria, nome, valUnit, infoProduto, codDeBarras, marca, memoria, processador, PolegadaTela, SistOper) 
    VALUES('$codProduto','$categoria','$nome_do_produto','$preco_do_produto','$infoProduto','$codDeBarras','$marca','$memoria','$processador','$polegadaTela','$SistOper')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar produto<br>' . mysqli_error($cnx));
    }
    return 'Produto cadastrado com sucesso!';
}

function pegarTodosProdutos(){
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(), $sql);
    $produtos = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $produtos[] = $linha;
    }
    return $produtos;
};


?>

