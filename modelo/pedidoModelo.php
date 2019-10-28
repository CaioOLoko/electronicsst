<?php

function allPedido()
{
	$sql = "CALL sp_TodosPedidos ()";
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
	$dataCompra,
	$produtos
)
{
	$sql = "CALL sp_addPedido (
				'$usuario',
				'$pagamento',
				'$dataCompra'
			)";
	$resultado = mysqli_query(conn(), $sql);

	$id_pedido = mysqli_insert_id(conn());

	foreach ($produtos as $produto) {
		$id = $produto['idProduto'];
		$quantidade = $produto['quantidade'];
		$sql = "CALL sp_addPedidoProduto (
					'$id_pedido',
					'$id',
					'$quantidade'
				)";
		$resultado = mysqli_query(conn(), $sql);
	}

	return true;
}

function getPedidoByUser($idUsuario)
{
	$sql = "CALL sp_PedidosByUsuario ('$idUsuario')";
	$resultado = mysqli_query(conn(), $sql);
	$pedidos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$pedidos[] = $linha;
	}
	return $pedidos;
}

function getPedidoForDate($data)
{
	$sql = "CALL sp_PedidosByDataCompra ('$data')";
	$resultado = mysqli_query(conn(), $sql);
	$pedidos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$pedidos[] = $linha;
	}
	return $pedidos;
}

function getPedidoByCity($cidade)
{
	$sql = "CALL sp_PedidosPorCidade ('$cidade')";

	$resultado = mysqli_query(conn(), $sql);
	$pedidos_municipio = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$pedidos_municipio[] = $linha;
	}
	return $pedidos_municipio;
}
