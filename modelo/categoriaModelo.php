<?php

function allCategoria() 
{
	$sql = "SELECT * 
			FROM categoria";
	$resultado = mysqli_query(conn(), $sql);
	$categorias = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$categorias[] = $linha;
	}
	return $categorias;
}

function viewCategoria($id)
{
	$sql = "SELECT * 
			FROM categoria 
			WHERE idCategoria = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$categoria = mysqli_fetch_assoc($resultado);
	return $categoria;
}

function delCategoria($id)
{
	$sql = "DELETE FROM categoria 
			WHERE idCategoria = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar categoria' . mysqli_error(conn()));}
	return 'Categoria deletada com sucesso!';
}

function addCategoria($nome)
{
	$sql = "INSERT INTO categoria 
			VALUES(
				NULL,
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
	$sql = "UPDATE categoria 
			SET nome = '$nome' 
			WHERE idCategoria = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar categoria' . mysqli_error(conn()));}
	return 'Categoria alterada com sucesso!';
}