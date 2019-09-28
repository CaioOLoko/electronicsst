<?php

function allEndereco()
{
	$sql = "SELECT * 
			FROM endereco
			ORDER BY idUsuario,logradouro ASC";
	$resultado = mysqli_query(conn(), $sql);
	$enderecos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$enderecos[] = $linha;
	}
	return $enderecos;
}

function getEnderecoByUsuario($idUsuario)
{
	$sql = "SELECT * 
			FROM endereco 
			WHERE idUsuario = '$idUsuario'
			ORDER BY idEndereco ASC";
	$resultado = mysqli_query(conn(), $sql);
	$enderecos_usuario = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$enderecos_usuario[] = $linha;
	}
	return $enderecos_usuario;
}

function viewEndereco($id)
{
	$sql = "SELECT * 
			FROM endereco 
			WHERE idEndereco = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$endereco = mysqli_fetch_assoc($resultado);
	return $endereco;
}

function delEndereco($id)
{
	$sql = "DELETE FROM endereco 
			WHERE idEndereco = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar endereço' . mysqli_error(conn()));}
	return 'Endereço deletado com sucesso!';
}

function delEnderecoByUsuario($idUsuario)
{
	$sql = "DELETE FROM endereco 
			WHERE idUsuario = '$idUsuario'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar endereço' . mysqli_error(conn()));}
	return 'Endereço deletado com sucesso!';
}

function addEndereco(
	$idUsuario,
	$logradouro,
	$numero,
	$complemento,
	$bairro,
	$cidade,
	$cep
)
{
	$sql = "INSERT INTO endereco 
			VALUES(
				NULL,
				'$idUsuario',
				'$logradouro', 
				'$numero',
				'$complemento', 
				'$bairro', 
				'$cidade', 
				'$cep'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar endereço<br>' . mysqli_error(conn()));}
	return 'Endereço cadastrado com sucesso!';
}

function editEndereco(
	$id,
	$logradouro,
	$numero,
	$complemento,
	$bairro,
	$cidade,
	$cep
)
{
	$sql = "UPDATE endereco 
			SET logradouro = 	'$logradouro', 
				numero = 		'$numero',
				complemento = 	'$complemento', 
				bairro = 		'$bairro', 
				cidade = 		'$cidade', 
				cep = 			'$cep' 
			WHERE idEndereco = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar endereço' . mysqli_error(conn()));}
	return 'Endereço alterado com sucesso!';
}
