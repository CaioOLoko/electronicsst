<?php

function adicionarCategoria($codCategoria,$categoria){
    $sql = "INSERT INTO categoria(idCategoria, nomeCategoria) VALUES('$codCategoria','$categoria')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar categoria' . mysqli_error($cnx));
    }
return 'Categoria cadastrada com sucesso!';
}

function pegarTodasCategorias(){
    $sql = "SELECT * FROM categoria";
    $resultado = mysqli_query(conn(), $sql);
    $categorias = array();
    while($linha = mysqli_fetch_assoc($resultado)){
        $categorias[] = $linha;
    }
    return $categorias;
}

?>