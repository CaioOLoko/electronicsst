<?php

function adicionarProduto($codProduto,$categoria,$nome_do_produto,$preco_do_produto,$infoProduto,$codDeBarras,$marca,$modelo,$cor,$memoria,$processador,$polegadaTela,$SistOper){
    $sql = "INSERT INTO cliente(codProduto, categoria, nome, valUnit, infoProduto, codDeBarras, marca, modelo, cor, memoria, processador, PolegadaTela, SistOper) VALUES('$codProduto','$categoria','$nome_do_produto','$preco_do_produto','$infoProduto','$codDeBarras','$marca','$modelo','$cor','$memoria','$processador','$polegadaTela','$SistOper')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar produto' . mysqli_error($cnx));
    }
return 'Produto cadastrado com sucesso!';
}

?>

