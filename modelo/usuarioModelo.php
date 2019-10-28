<?php

function allUsuario()
{
	$sql = "CALL sp_TodosUsuarios ()";
	$resultado = mysqli_query(conn(), $sql);
	$usuarios = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$usuarios[] = $linha;
	}
	return $usuarios;
}

function viewUsuario($id)
{
	$sql = "CALL sp_selUsuario ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function delUsuario($id)
{
	$sql = "CALL sp_delUsuario ('$id')";
	$resultado = mysqli_query($cnx = conn(), $sql);
	if(!$resultado) { die('Erro ao deletar usuário' . mysqli_error($cnx)); }
	return 'Usuario deletado com sucesso!';
}

function convertUsuarioAdm($id)
{
	$sql = "CALL sp_UsuarioToAdm ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao tornar adm' . mysqli_error(conn()));}
	return true;
}

function getUsuarioByEmailSenha(
	$email,
	$senha
)
{
	$sql = "CALL sp_UsuarioByEmailSenha ('$email', '$senha')";
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
	$sexo
)
{
	$sql = "CALL sp_addUsuario (
				'$nome', 
				'$sobrenome', 
				'$email',
				'$senha', 
				'$cpf',
				'$nascimento', 
				'$sexo',
				'user'
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
	$sql = "CALL sp_updUsuario (
				'$id', 
				'$nome',
				'$sobrenome',
				'$email',
				'$senha',
				'$cpf',
				'$nascimento',
				'$sexo'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if(!$resultado) { die('Erro ao alterar usuário' . mysqli_error(conn())); }
	return 'Usuário alterado com sucesso!';
}
