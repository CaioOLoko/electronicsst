<?php

require_once "servico/validacaoServico.php";
require_once "modelo/categoriaModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["categorias"] = allCategoria();
	exibir("categoria/index", $dados);
}

/** admin */
function visualizar($id)
{
	$dados = array();
	$dados["categoria"] = viewCategoria($id);
	exibir("categoria/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	delCategoria($id);
	redirecionar("categoria/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {
		$categoria = $_POST["nome"];

		$errors = array();

//		if (!validar_Categoria($categoria)) {$errors["categoria"] = "Categoria inválida";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("categoria/formulario", $dados);
		} else {
			addCategoria($categoria);
			redirecionar("categoria/");
		}
	} else {
		exibir("categoria/formulario");
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {
		$categoria = $_POST["nome"];

		$errors = array();

//		if (!validar_Categoria($categoria)) {$errors["categoria"] = "Categoria inválida";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("categoria/editar", $dados);
		} else {
			editCategoria(
				$id,
				$categoria
			);
			redirecionar("categoria/");
		}
	} else {
		$dados = array();
		$dados["categoria"] = viewCategoria($id);
		exibir("categoria/editar", $dados);
	}
}
