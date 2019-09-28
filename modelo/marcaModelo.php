<?php

function allMarca() 
{
	$sql = "SELECT * 
			FROM marca";
	$resultado = mysqli_query(conn(), $sql);
	$marcas = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$marcas[] = $linha;
	}
	return $marcas;
}

function viewMarca($id)
{
	$sql = "SELECT * 
			FROM marca 
			WHERE idMarca = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$marca = mysqli_fetch_assoc($resultado);
	return $marca;
}

function delMarca($id)
{
	$sql = "DELETE FROM marca 
			WHERE idMarca = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar marca' . mysqli_error(conn()));}
	return 'Marca deletada com sucesso!';
}

function addMarca($nome)
{
	$sql = "INSERT INTO marca 
			VALUES(
				NULL,
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar marca'.mysqli_error(conn()));}
	return 'Marca cadastrada com sucesso!';
}

function editMarca(
	$id,
	$nome
)
{
	$sql = "UPDATE marca 
			SET nome = '$nome' 
			WHERE idMarca = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar marca' . mysqli_error(conn()));}
	return 'Marca alterada com sucesso!';
}