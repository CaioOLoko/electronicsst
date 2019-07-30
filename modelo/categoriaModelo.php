<?php

function adicionarCategoria($categoria) {
    $sql = "INSERT INTO categoria(idcategoria, descricao) VALUES(NULL,'$categoria')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao cadastrar categoria' . mysqli_error($cnx));
    }
    return 'Categoria cadastrada com sucesso!';
}

function pegarTodasCategorias() {
    $sql = "SELECT * FROM categoria";
    $resultado = mysqli_query(conn(), $sql);
    $categorias = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $linha;
    }
    return $categorias;
}

function pegarCategoriaPorId($id) {
    $sql = "SELECT * FROM categoria WHERE idcategoria = $id";
    $resultado = mysqli_query(conn(), $sql);
    $categoria = mysqli_fetch_assoc($resultado);
    return $categoria;
}

function deletarCategoria($id) {
    $sql = "DELETE FROM categoria WHERE idcategoria = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao deletar categoria' . mysqli_error($cnx));
    }
    return 'Categoria deletado com sucesso!';
}

function editarCategoria($id, $categoria) {
    $sql = "UPDATE categoria SET descricao = '$categoria' WHERE idcategoria = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao alterar categoria' . mysqli_error($cnx));
    }
    return 'Categoria alterado com sucesso!';
}

?>