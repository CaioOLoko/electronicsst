<?php

require_once "servico/validacaoServico.php";

require_once "modelo/usuarioModelo.php";
require_once "modelo/enderecoModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["usuarios"] = allUsuario();
	exibir("usuario/index", $dados);
}

/** anon */
function visualizar($id)
{
	$dados = array();
	$dados["usuario"] = 	viewUsuario($id);
	$dados["enderecos"] = 	getEnderecoByUsuario($id);
	exibir("usuario/visualizar", $dados);
}

/** anon */
function deletar($id) {
	delUsuario($id);
	delEnderecoByUsuario($id);
	redirecionar("usuario/");
}

/** anon */
function adicionar()
{
	if (ehPost()) {

		$nome = 		$_POST["nome"];
		$sobrenome =    $_POST["sobrenome"];
		$email = 		$_POST["email"];
		$senha = 		$_POST["senha"];
		$cpf = 			$_POST["cpf"];
		$sexo = 		$_POST["sexo"];
		$dia = 			$_POST["dia"];
		$mes = 			$_POST["mes"];
		$ano = 			$_POST["ano"];

		$errors = array();

//		if (!validar_Nome($nome)){$errors['nome'] = "Nome inválido!";}
//		if (!validar_Nome($sobrenome)){$errors['sobrenome'] = "Sobrenome inválido!";}
//		if (!validar_Email($email)){$errors['email'] = "Email inválido!";}
//		if (!validar_Senha($senha)){$errors['senha'] = "Senha não permitida!";}
//		if (!validar_CPF($cpf)){$errors['cpf'] = "CPF inválido!";}
//		if (!validar_Data($dia,$mes,$ano)){$errors['nascimento'] = "Data inválida!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("usuario/cadastro", $dados);
		} else {
			$retirarCPF = array("-", ".");
			$cpf = str_replace($retirarCPF, "", $cpf);
			$nascimento = $ano.'-'.$mes.'-'.$dia;

			addUsuario(
				$nome,
				$sobrenome,
				$email,
				$senha,
				$cpf,
				$nascimento,
				$sexo
			);
			redirecionar("usuario/");
		}
	} else {
		exibir("usuario/cadastro");
	}
}

/** anon */
function editar($id)
{
	if (ehPost()) {

		$nome = 		$_POST["nome"];
		$sobrenome =    $_POST["sobrenome"];
		$email = 		$_POST["email"];
		$senha = 		$_POST["senha"];
		$cpf = 			$_POST["cpf"];
		$sexo = 		$_POST["sexo"];
		$dia = 			$_POST["dia"];
		$mes = 			$_POST["mes"];
		$ano = 			$_POST["ano"];

		$errors = array();

//		if (!validar_Nome($nome)){$errors['nome'] = "Nome inválido!";}
//		if (!validar_Nome($sobrenome)){$errors['sobrenome'] = "Sobrenome inválido!";}
//		if (!validar_Email($email)){$errors['email'] = "Email inválido!";}
//		if (!validar_Senha($senha)){$errors['senha'] = "Senha não permitida!";}
//		if (!validar_CPF($cpf)){$errors['cpf'] = "CPF inválido!";}
//		if (!validar_Data($dia,$mes,$ano)){$errors['nascimento'] = "Data inválida!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["erro"] = 	$errors;
			$dados["usuario"] = viewUsuario($id);
			exibir("usuario/editar", $dados);
		} else {
			$retirarCPF = array("-", ".");
			$cpf = str_replace($retirarCPF, "", $cpf);
			$nascimento = $ano.'-'.$mes.'-'.$dia;

			editUsuario(
				$id,
				$nome,
				$sobrenome,
				$email,
				$senha,
				$cpf,
				$nascimento,
				$sexo
			);
			redirecionar("usuario/");
		}
	} else {
		$dados["usuario"] = viewUsuario($id);
		exibir("usuario/editar", $dados);
	}
}
