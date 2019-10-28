<?php

function allCategoria() 
{
	$sql = "CALL sp_TodasCategorias ()";
	$resultado = mysqli_query(conn(), $sql);
	$categorias = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$categorias[] = $linha;
	}
	return $categorias;
}

function viewCategoria($id)
{
	$sql = "CALL sp_selCategoria ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$categoria = mysqli_fetch_assoc($resultado);
	return $categoria;
}

function delCategoria($id)
{
	$sql = "CALL sp_delCategoria ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar categoria' . mysqli_error(conn()));}
	return 'Categoria deletada com sucesso!';
}

function addCategoria($nome)
{
	$sql = "CALL sp_addCategoria (
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar categoria'.mysqli_error(conn()));}
	return 'Categoria cadastrada com sucesso!';
}

function editCategoria(
	$id,
	$nome
)
{
	$sql = "CALL sp_updCategoria (
				'$id',
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar categoria' . mysqli_error(conn()));}
	return 'Categoria alterada com sucesso!';
}