<?php

function adicionarFormaPagamento($descricao) {
    $sql = "INSERT INTO FormaPagamento(idFormaPagamento, descricao) VALUES(NULL,'$descricao')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao cadastrar forma de pagamento' . mysqli_error($cnx));
    }
    return 'Forma de pagamento cadastrado com sucesso!';
}

function pegarTodasFormasPagamentos() {
    $sql = "SELECT * FROM FormaPagamento";
    $resultado = mysqli_query(conn(), $sql);
    $formaspagamentos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $formaspagamentos[] = $linha;
    }
    return $formaspagamentos;
}

function pegarFormaPagamentoPorId($id) {
    $sql = "SELECT * FROM FormaPagamento WHERE idFormaPagamento = $id";
    $resultado = mysqli_query(conn(), $sql);
    $formapagamento = mysqli_fetch_assoc($resultado);
    return $formapagamento;
}

function deletarFormaPagamento($id) {
    $sql = "DELETE FROM FormaPagamento WHERE idFormaPagamento = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao deletar forma de pagamento!' . mysqli_error($cnx));
    }
    return 'Forma de pagamento deletado com sucesso!';
}

function editarFormaPagamento($id, $descricao) {
    $sql = "UPDATE FormaPagamento SET descricao = '$descricao' WHERE idFormaPagamento = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao alterar forma de pagamento' . mysqli_error($cnx));
    }
    return 'Forma de pagamento alterado com sucesso!';
}

?>

