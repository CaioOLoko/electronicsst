<?php

function allPagamento()
{
	$sql = "CALL sp_TodosPagamentos ()";
	$resultado = mysqli_query(conn(), $sql);
	$formaspagamentos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$formaspagamentos[] = $linha;
	}
	return $formaspagamentos;
}

function viewPagamento($id)
{
	$sql = "CALL sp_selPagamento ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$formapagamento = mysqli_fetch_assoc($resultado);
	return $formapagamento;
}

function delPagamento($id)
{
	$sql = "CALL sp_delPagamento ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar forma de pagamento!' . mysqli_error(conn()));}
	return 'Forma de pagamento deletado com sucesso!';
}

function addPagamento($nome)
{
	$sql = "CALL sp_addPagamento (
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar forma de pagamento' . mysqli_error(conn()));}
	return 'Forma de pagamento cadastrado com sucesso!';
}

function editPagamento(
	$id,
	$nome
)
{
	$sql = "CALL sp_updPagamento (
				'$idFormaPagamento',
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar forma de pagamento' . mysqli_error(conn()));}
	return 'Forma de pagamento alterado com sucesso!';
}
