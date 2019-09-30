<?php

require_once "servico/validacaoServico.php";
require_once "modelo/marcaModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["marcas"] = allMarca();
	exibir("marca/index", $dados);
}

/** admin */
function visualizar($id)
{
	$dados = array();
	$dados["marca"] = viewMarca($id);
	exibir("marca/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	delMarca($id);
	redirecionar("marca/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {

		$marca = $_POST["nome"];

		$errors = array();

		// if (!validar_Marca($marca)) {$errors["marca"] = "Marca inválida";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("marca/adicionar", $dados);
		} else {
			addMarca($marca);
			redirecionar("marca/");
		}
	} else {
		exibir("marca/adicionar");
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {

		$nome = $_POST["nome"];

		$errors = array();

		// if (!validar_Marca($marca)) {$errors["marca"] = "Marca inválida";}

		if (count($errors) > 0) {
			$dados = array();
            $dados["errors"] =  $errors;
            $dados["marca"] =   viewMarca($id);
			exibir("marca/editar", $dados);
		} else {
			editMarca(
				$id,
				$marca
			);
			redirecionar("marca/");
		}
	} else {
		$dados = array();
		$dados["marca"] = viewMarca($id);
		exibir("marca/editar", $dados);
	}
}
