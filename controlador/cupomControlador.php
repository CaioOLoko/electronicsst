<?php

require_once "servico/validacaoServico.php";

require_once "modelo/cupomModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["cupons"] = allCupom();
	exibir("cupom/index", $dados);
}

/** admin */
function visualizar($id)
{
	$dados = array();
	$dados["cupom"] = viewCupom($id);
	exibir("cupom/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	delCupom($id);
	redirecionar("cupom/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {
		$nome = 		$_POST["nome"];
		$desconto = 	$_POST["desconto"];

		$errors = array();

//		if (!validar_Nome($nome)) {$errors['nome'] = "Cupom inválido!";}
//		if (!validar_Desconto($desconto)) {$errors['desconto'] = "Desconto inválido!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("cupom/formulario", $dados);
		} else {
			addCupom(
				$nome,
				$desconto
			);
			redirecionar("cupom/");
		}
	} else {
		exibir("cupom/formulario");
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {
		$nome = 		$_POST["nome"];
		$desconto = 	$_POST["desconto"];

		$errors = array();
		
//		if (!validar_Nome($nome)) {$errors['nome'] = "Cupom inválido!";}
//		if (!validar_Desconto($desconto)) {$errors['desconto'] = "Desconto inválido!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("cupom/editar", $dados);
		} else {
			editCupom(
				$id,
				$nome,
				$desconto
			);
			redirecionar("cupom/");
		}
	} else {
		$dados = array();
		$dados["cupom"] = viewCupom($id);
		exibir("cupom/editar", $dados);
	}
}
