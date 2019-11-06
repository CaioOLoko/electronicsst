<?php

function allMarca()
{
	$sql = "CALL sp_TodasMarcas ()";
	$resultado = mysqli_query(conn(), $sql);
	$marcas = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$marcas[] = $linha;
	}
	return $marcas;
}

function viewMarca($idMarca)
{
	$sql = "CALL sp_selMarca ('$idMarca')";
	$resultado = mysqli_query(conn(), $sql);
	$marca = mysqli_fetch_assoc($resultado);
	return $marca;
}

function getMarcaByNome($nome)
{
	$sql = "CALL sp_MarcaByNome ('$nome')";
	$resultado = mysqli_query(conn(), $sql);
	$marcas = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$marcas[] = $linha;
	}
	return $marcas;
}

function delMarca($idMarca)
{
	$sql = "CALL sp_delMarca ('$idMarca')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar marca' . mysqli_error(conn()));}
	return 'Marca deletada com sucesso!';
}

function addMarca($nome)
{
	$sql = "CALL sp_addMarca ('$nome')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar marca'.mysqli_error(conn()));}
	return 'Marca cadastrada com sucesso!';
}

function editMarca(
	$idMarca,
	$nome
)
{
	$sql = "CALL sp_updMarca (
				'$idMarca',
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar marca' . mysqli_error(conn()));}
	return 'Marca alterada com sucesso!';
}

function returnIdMarcaByNome($nome)
{
	$sql = "CALL sp_IdMarcaByNome ('$nome')";
	$resultado = mysqli_query(conn(), $sql);
	$idmarca = mysqli_fetch_assoc($resultado);
	return $idmarca;
}