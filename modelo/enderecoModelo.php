<?php

function adicionarEndereco($logradouro, $numero, $complemento, $bairro, $cidade, $cep) {
    $sql = "INSERT INTO endereco(idendereco, logradouro, numero, complemento, bairro, cidade, cep) VALUES(NULL,'$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$cep')";

    $resultado = mysqli_query($cnx = conn(), $sql);

    if (!$resultado) {
        die('Erro ao cadastrar endereço<br>' . mysqli_error($cnx));
    }
    return 'Endereço cadastrado com sucesso!';
}

function pegarTodosEnderecos() {
    $sql = "SELECT * FROM endereco";
    $resultado = mysqli_query(conn(), $sql);
    $enderecos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $enderecos[] = $linha;
    }
    return $enderecos;
}

;

function pegarEnderecoPorId($id) {
    $sql = "SELECT * FROM endereco WHERE idendereco = $id";
    $resultado = mysqli_query(conn(), $sql);
    $endereco = mysqli_fetch_assoc($resultado);
    return $endereco;
}

function deletarEndereco($id) {
    $sql = "DELETE FROM endereco WHERE idendereco = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao deletar endereço' . mysqli_error($cnx));
    }
    return 'Endereço deletado com sucesso!';
}

function editarEndereco($id, $logradouro, $numero, $complemento, $bairro, $cidade, $cep) {
    $sql = "UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', cep = '$cep' WHERE idendereco = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!resultado) {
        die('Erro ao alterar endereço' . mysqli_error($cnx));
    }
    return 'Endereço alterado com sucesso!';
}
?>

