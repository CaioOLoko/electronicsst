<?php

function allUsuario()
{
	$sql = "SELECT * 
			FROM usuario
			ORDER BY tipo,nome,sobrenome ASC";
	$resultado = mysqli_query(conn(), $sql);
	$usuarios = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$usuarios[] = $linha;
	}
	return $usuarios;
}

function viewUsuario($id)
{
	$sql = "SELECT * 
			FROM usuario 
			WHERE idUsuario = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function delUsuario($id)
{
	$sql = "DELETE FROM usuario 
			WHERE idUsuario = '$id'";
	$resultado = mysqli_query($cnx = conn(), $sql);
	if(!$resultado) { die('Erro ao deletar usuário' . mysqli_error($cnx)); }
	return 'Usuario deletado com sucesso!';
}

function convertUsuarioAdm($id)
{
	$sql = "UPDATE usuario 
			SET tipo = 'admin' 
			WHERE idUsuario = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao tornar adm' . mysqli_error(conn()));}
	return 'Bem Vindo Adm';
}

function getUsuarioByNome($nome)
{
	$sql = "SELECT * 
			FROM usuario 
			WHERE nome LIKE '%$nome%' 
			ORDER BY tipo,nome,sobrenome ASC";
	$resultado = mysqli_query(conn(), $sql);
	$usuarios = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$usuarios[] = $linha;
	}
	return $usuarios;
}

function getUsuarioByEmailSenha(
	$email,
	$senha
)
{
	$sql = "SELECT * 
			FROM usuario 
			WHERE email = '$email' AND senha = '$senha'";
	$resultado = mysqli_query(conn(), $sql);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function addUsuario(
	$nome,
	$sobrenome,
	$email,
	$senha,
	$cpf,
	$nascimento,
	$sexo,
	$tipo
)
{
	$sql = "INSERT INTO usuario 
			VALUES (
				NULL,
				'$nome',
				'$sobrenome',
				'$email',
				'$senha',
				'$cpf',
				'$nascimento',
				'$sexo',
				'$tipo'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if(!$resultado) { die('Erro ao cadastrar usuário' . mysqli_error(conn())); }
	return 'Usuario cadastrado com sucesso!';
}

function editUsuario(
	$id,
	$nome,
	$sobrenome,
	$email,
	$senha,
	$cpf,
	$nascimento,
	$sexo
)
{
	$sql = "UPDATE usuario 
			SET nome = 			'$nome',
				sobrenome = 	'$sobrenome',
				email = 		'$email',
				senha = 		'$senha',
				cpf = 			'$cpf',
				nascimento =	'$nascimento',
				sexo = 			'$sexo'
			WHERE idUsuario = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if(!$resultado) { die('Erro ao alterar usuário' . mysqli_error(conn())); }
	return 'Usuário alterado com sucesso!';
}
