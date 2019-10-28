<?php

function allCupom()
{
	$sql = "CALL sp_TodosCupons ()";
	$resultado = mysqli_query(conn(), $sql);
	$cupons = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$cupons[] = $linha;
	}
	return $cupons;
}

function viewCupom($id)
{
	$sql = "CALL sp_selCupom ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$cupom = mysqli_fetch_assoc($resultado);
	return $cupom;
}

function delCupom($id)
{
	$sql = "CALL sp_delCupom ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar cupom' . mysqli_error(conn()));}
	return 'Cupom deletado com sucesso!';
}

function addCupom(
	$nome,
	$desconto
)
{
	$sql = "CALL sp_addCupom (
				'$nome',
				'$desconto'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar cupom' . mysqli_error(conn()));}
	return 'Cupom cadastrado com sucesso!';
}

function editCupom(
	$id,
	$nome,
	$desconto
)
{
	$sql = "CALL sp_updCupom (
			'$id',
			'$nome',
			'$desconto'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar cupom' . mysqli_error(conn()));}
	return 'Cupom alterado com sucesso!';
}
