<?php

function allCupom()
{
	$sql = "SELECT * 
			FROM cupom";
	$resultado = mysqli_query(conn(), $sql);
	$cupons = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$cupons[] = $linha;
	}
	return $cupons;
}

function viewCupom($id)
{
	$sql = "SELECT * 
			FROM cupom 
			WHERE idCupom = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$cupom = mysqli_fetch_assoc($resultado);
	return $cupom;
}

function delCupom($id)
{
	$sql = "DELETE FROM cupom 
			WHERE idCupom = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar cupom' . mysqli_error(conn()));}
	return 'Cupom deletado com sucesso!';
}

function addCupom(
	$nome,
	$desconto
)
{
	$sql = "INSERT INTO cupom
			VALUES(
				NULL,
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
	$sql = "UPDATE cupom 
			SET nome = 		'$nome',
				desconto = 	'$desconto' 
			WHERE idCupom = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar cupom' . mysqli_error(conn()));}
	return 'Cupom alterado com sucesso!';
}
