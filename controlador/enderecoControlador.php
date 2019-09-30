<?php

require_once "servico/validacaoServico.php";

require_once "modelo/enderecoModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["enderecos"] = allEndereco();
	exibir("endereco/index", $dados);
}

/** anon */
function visualizar($idEndereco)
{
	$dados = array();
	$dados["endereco"] = viewEndereco($idEndereco);
	exibir("endereco/visualizar", $dados);
}

/** anon */
function deletar($id)
{
	delEndereco($id);
	redirecionar("endereco/");
}

/** anon */
function adicionar($idUsuario)
{
	if (ehPost()) {
		
		$logradouro = 		$_POST["logradouro"];
		$numero = 			$_POST["numero"];
		$complemento = 		$_POST["complemento"];
		$bairro = 			$_POST["bairro"];
		$cidade = 			$_POST["cidade"];
		$cep = 				$_POST["cep"];

		$errors = array();

//		if (!validar_Logradouro($logradouro)){$errors['logradouro'] = "Logradouro inválido!";}
//		if (!validar_Numero($numero)) {$errors['numero'] = "Número inválido!";}
//		if (!validar_Complemento($complemento)){$errors['complemento'] = "Complemento inválido!";}
//		if (!validar_Bairro($bairro)) {$errors['bairro'] = "Bairro inválido!";}
//		if (!validar_Cidade($cidade)) {$errors['cidade'] = "Cidade inválida!";}
//		if (!validar_Cep($cep)) {$errors['cep'] = "CEP inválido!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("endereco/formulario", $dados);
		} else {
			addEndereco(
				$idUsuario,
				$logradouro,
				$numero,
				$complemento,
				$bairro,
				$cidade,
				$cep
			);
			redirecionar("usuario/visualizar/$idUsuario");
		}
	} else {
		exibir("endereco/formulario");
	}
}

/** anon */
function editar(
	$idUsuario,
	$idEndereco
)
{
	if (ehPost()) {

		$logradouro = 		$_POST["logradouro"];
		$numero = 			$_POST["numero"];
		$complemento = 		$_POST["complemento"];
		$bairro = 			$_POST["bairro"];
		$cidade = 			$_POST["cidade"];
		$cep = 				$_POST["cep"];

		$errors = array();

//		if (!validar_Logradouro($logradouro)){$errors['logradouro'] = "Logradouro inválido!";}
//		if (!validar_Numero($numero)) {$errors['numero'] = "Número inválido!";}
//		if (!validar_Complemento($complemento)){$errors['complemento'] = "Complemento inválido!";}
//		if (!validar_Bairro($bairro)) {$errors['bairro'] = "Bairro inválido!";}
//		if (!validar_Cidade($cidade)) {$errors['cidade'] = "Cidade inválida!";}
//		if (!validar_Cep($cep)) {$errors['cep'] = "CEP inválido!";}
		
		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("endereco/formulario", $dados);
		} else {
			editEndereco(
				$idEndereco,
				$logradouro,
				$numero,
				$complemento,
				$bairro,
				$cidade,
				$cep
			);
			redirecionar("usuario/visualizar/$idUsuario");
		}
	} else {
		$dados = array();
		$dados["endereco"] = viewEndereco($idEndereco);
		exibir("endereco/formulario", $dados);
	}
}
