<?php

require_once "servico/validacaoServico.php";
require_once "servico/uploadServico.php";

require_once "modelo/usuarioModelo.php";
require_once "modelo/enderecoModelo.php";

/** admin */
function index($tipo)
{
	$dados = array();
	$dados["usuarios"] = allUsuario($tipo);
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
	redirecionar("usuario/index/");
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

		// if (!validar_Nome($nome)){$errors['nome'] = "Nome inválido!";}
		// if (!validar_Nome($sobrenome)){$errors['sobrenome'] = "Sobrenome inválido!";}
		// if (!validar_Email($email)){$errors['email'] = "Email inválido!";}
		// if (!validar_Senha($senha)){$errors['senha'] = "Senha não permitida!";}
		// if (!validar_CPF($cpf)){$errors['cpf'] = "CPF inválido!";}
		// if (!validar_Data($dia,$mes,$ano)){$errors['nascimento'] = "Data inválida!";}

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

			if ((acessoUsuarioEstaLogado()) && (acessoPegarPapelDoUsuario() == 'admin')) {
				redirecionar("usuario/index/");
			} else {
				redirecionar("login/");
			}
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

		// if (!validar_Nome($nome)){$errors['nome'] = "Nome inválido!";}
		// if (!validar_Nome($sobrenome)){$errors['sobrenome'] = "Sobrenome inválido!";}
		// if (!validar_Email($email)){$errors['email'] = "Email inválido!";}
		// if (!validar_Senha($senha)){$errors['senha'] = "Senha não permitida!";}
		// if (!validar_CPF($cpf)){$errors['cpf'] = "CPF inválido!";}
		// if (!validar_Data($dia,$mes,$ano)){$errors['nascimento'] = "Data inválida!";}

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

			if ((acessoPegarPapelDoUsuario() == 'admin') && (acessoPegarUsuarioLogado() == $id)) {
				redirecionar("usuario/visualizar/$id");
			} else {
				redirecionar("usuario/index/");
			}
		}
	} else {
		$dados["usuario"] = viewUsuario($id);
		exibir("usuario/editar", $dados);
	}
}

/** admin */
function adm($id)
{
	convertUsuarioAdm($id);
	redirecionar("usuario/index/");
}

function upload()
{
	if (ehPost()) {
		$nome_arquivo = 	$_FILES['lista']['name'];
		$nome_tmp_arquivo = $_FILES['lista']['tmp_name'];
		
		$arquivo = uploadFile($nome_tmp_arquivo, $nome_arquivo);
		
		echo $arquivo;
		// $separacao = substr($nome_arquivo, -4);

		// if ($separacao == '.csv') {
		// 	',';
		// } else {
		// 	chr(9);
		// }
		

		// $registros = fopen($arquivo, 'r');

		// 	while (!feof($registros))
		// 	{
		// 		$linha = fgets($registros);
		// 		$dados = explode($separacao, $linha);

		// 		if ($dados[0] == "Nome") {
		// 			continue;
		// 		}

		// 		$nome = 			$dados[0];
		// 		$sobrenome = 		$dados[1];
		// 		$email = 			$dados[2];
		// 		$senha = 			$dados[3];
		// 		$cpf = 				$dados[4];
		// 		$nascimento = 		$dados[5];
		// 		$sexo = 			$dados[6];

		// 		addUsuario(
		// 			$nome,
		// 			$sobrenome,
		// 			$email,
		// 			$senha,
		// 			$cpf,
		// 			$nascimento,
		// 			$sexo
		// 		);
		// 	}

		// fclose($registros);

		// redirecionar("usuario/index/");
	} else {
		exibir("usuario/upload");
	}
}
