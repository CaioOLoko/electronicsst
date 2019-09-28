<?php

require_once "servico/validacaoServico.php";

require_once "modelo/FormaPagamentoModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["formaspagamento"] = allPagamento();
	exibir("FormaPagamento/listar", $dados);
}

/** admin */
function visualizar($id)
{
	$dados = array();
	$dados["formapagamento"] = viewPagamento($id);
	exibir("FormaPagamento/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	delPagamento($id);
	redirecionar("FormaPagamento/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {

		$nome = $_POST["nome"];
		
		$errors = array();
		
		if (!validar_Nome($nome)) {$errors['pagamento'] = "Forma de Pagamento inválida!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("FormaPagamento/formulario", $dados);
		} else {
			addPagamento($nome);
			redirecionar("FormaPagamento/");
		}
	} else {
		exibir("FormaPagamento/formulario");
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {

		$nome = $_POST["nome"];
		
		$errors = array();
		
		if (!validar_Nome($nome)) {$errors['pagamento'] = "Forma de Pagamento inválida!";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("FormaPagamento/editar", $dados);
		} else {
			editPagamento(
				$id,
				$nome
			);
			redirecionar("FormaPagamento/");
		}
	} else {
		$dados = array();
		$dados["formapagamento"] = viewPagamento($id);
		exibir("FormaPagamento/editar", $dados);
	}
}
