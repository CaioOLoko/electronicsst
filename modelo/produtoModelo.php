<?php

function adicionarProduto($categoria,$preco_do_produto, $nome_do_produto, $infoProduto, $imagem, $estoque_minimo, $estoque_maximo){
    $sql = "INSERT INTO produto(idproduto, idcategoria, preco, nomeproduto, descricao, imagem, estoque_minimo, estoque_maximo) VALUES(NULL,'$categoria','$preco_do_produto', '$nome_do_produto', '$infoProduto', '$imagem', '$estoque_minimo', '$estoque_maximo')";
    
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

function pegarProdutoPorId($id){
    $sql = "SELECT * FROM produto WHERE idproduto = $id";
    $resultado = mysqli_query(conn(), $sql);
    $produto = mysqli_fetch_assoc($resultado);
    return $produto;
}

?>

