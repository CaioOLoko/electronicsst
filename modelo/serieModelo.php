<?php

function allSerie() 
{
	$sql = "SELECT * 
			FROM serie";
	$resultado = mysqli_query(conn(), $sql);
	$series = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$series[] = $linha;
	}
	return $series;
}

function viewSerie($id)
{
	$sql = "SELECT * 
			FROM serie 
			WHERE idSerie = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$serie = mysqli_fetch_assoc($resultado);
	return $serie;
}

function delSerie($id)
{
	$sql = "DELETE FROM serie 
			WHERE idSerie = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar serie' . mysqli_error(conn()));}
	return 'Serie deletada com sucesso!';
}

function addSerie(
    $marca,
    $nome
)
{
	$sql = "INSERT INTO serie 
			VALUES(
				NULL,
                '$marca',
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar serie'.mysqli_error(conn()));}
	return 'Serie cadastrada com sucesso!';
}

function editSerie(
    $id,
    $marca,
	$nome
)
{
	$sql = "UPDATE serie 
			SET nome =      '$nome',
                idMarca =   '$marca' 
			WHERE idSerie = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar serie' . mysqli_error(conn()));}
	return 'Serie alterada com sucesso!';
}