<?php

function adicionarCategoria($categoria){
    $sql = "INSERT INTO categoria(idCategoria, descricao) VALUES(NULL,'$categoria')";
    
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

function pegarCategoriaPorId($id){
    //Busca um único categoria pelo $id
    $sql = "SELECT * FROM categoria WHERE idCategoria = $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $categoria
    $categoria = mysqli_fetch_assoc($resultado);
    //retorna o $categoria
    return $categoria;
}

function deletarCategoria($id){
    $sql = "DELETE FROM categoria WHERE idCategoria = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado){
        die('Erro ao deletar categoria' . mysqli_error($cnx));
    }
    return 'Categoria deletado com sucesso!';
}


?>