<?php

function allPedido()
{
    $sql = "SELECT pedido.*, usuario.*, FormaPagamento.nome AS Pagamento, endereco.* "
            . "FROM pedido "
            . "INNER JOIN FormaPagamento "
            . "ON pedido.idFormaPagamento = FormaPagamento.idFormaPagamento "
            . "INNER JOIN usuario "
            . "ON pedido.idUsuario = usuario.idUsuario "
            . "INNER JOIN usuario "
            . "ON usuario.idUsuario = endereco.idUsuario "
            . "ORDER BY dataCompra";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}

function addPedido(
    $usuario,
    $pagamento,
    $dataCompra
)
{
    $sql = "INSERT INTO pedido VALUES(NULL, '$usuario', '$pagamento', '$dataCompra')";
    $resultado = mysqli_query(conn(), $sql);

    $id_pedido = mysqli_insert_id(conn());
    $produtos = $_SESSION['carrinho'];

    foreach ($produtos as $produto) {
        $id = $produto['idProduto'];
        $quantidade = $produto['quantidade'];
        $sql = "INSERT INTO pedido_produto VALUES('$id_pedido', '$id', '$quantidade')";
        $resultado = mysqli_query(conn(), $sql);
    }

    return true;
}

function getPedidoByUser($idUsuario)
{
    $sql = "SELECT * FROM pedido WHERE idUsuario = '$idUsuario' ORDER BY dataCompra";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}

function getPedidoForDate($data)
{
    $sql = "SELECT * FROM pedido WHERE dataCompra = '$data'";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}

function getPedidoByCity($cidade)
{
    $sql = "SELECT pedido.* "
            . "FROM pedido "
            . "INNER JOIN usuario "
            . "ON pedido.idUsuario = usuario.idUsuario "
            . "INNER JOIN endereco "
            . "ON usuario.idUsuario = endereco.idUsuario "
            . "WHERE endereco.cidade = '$cidade'";

    $resultado = mysqli_query(conn(), $sql);
    $pedidos_municipio = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedidos_municipio[] = $linha;
    }
    return $pedidos_municipio;
}
