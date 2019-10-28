<?php

function allEndereco()
{
	$sql = "CALL sp_TodosEnderecos ()";
	$resultado = mysqli_query(conn(), $sql);
	$enderecos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$enderecos[] = $linha;
	}
	return $enderecos;
}

function getEnderecoByUsuario($idUsuario)
{
	$sql = "CALL sp_EnderecosByUsuario ('$idUsuario')";
	$resultado = mysqli_query(conn(), $sql);
	$enderecos_usuario = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$enderecos_usuario[] = $linha;
	}
	return $enderecos_usuario;
}

function viewEndereco($id)
{
	$sql = "CALL sp_selEndereco ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$endereco = mysqli_fetch_assoc($resultado);
	return $endereco;
}

function delEndereco($id)
{
	$sql = "CALL sp_delEndereco ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar endereço' . mysqli_error(conn()));}
	return 'Endereço deletado com sucesso!';
}

function delEnderecoByUsuario($idUsuario)
{
	$sql = "CALL sp_delEnderecosByUsuario ('$idUsuario')";
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
	$sql = "CALL sp_addEndereco (
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
	$idEndereco,
	$logradouro,
	$numero,
	$complemento,
	$bairro,
	$cidade,
	$cep
)
{
	$sql = "CALL sp_updEndereco (
				'$idEndereco',
				'$logradouro',
				'$numero',
				'$complemento',
				'$bairro',
				'$cidade',
				'$cep'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar endereço' . mysqli_error(conn()));}
	return 'Endereço alterado com sucesso!';
}
