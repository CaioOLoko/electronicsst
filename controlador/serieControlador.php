<?php

require_once "servico/validacaoServico.php";
require_once "modelo/serieModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["series"] = allSerie();
	exibir("serie/index", $dados);
}

/** admin */
function visualizar($id)
{
	$dados = array();
	$dados["serie"] = viewSerie($id);
	exibir("serie/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	delSerie($id);
	redirecionar("serie/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {
		$serie = $_POST["nome"];

		$errors = array();

		if (strlen($serie) == 0) {$errors["serie"] = "Serie inválida";}
		// if (!validar_Serie($serie)) {$errors["serie"] = "Serie inválida";}

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("serie/adicionar", $dados);
		} else {
			addSerie($serie);
			redirecionar("serie/");
		}
	} else {
		exibir("serie/adicionar");
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {
		$serie = $_POST["nome"];

		$errors = array();

		if (strlen($serie) == 0) {$errors["serie"] = "Serie inválida";}
		// if (!validar_Serie($serie)) {$errors["serie"] = "Serie inválida";}

		if (count($errors) > 0) {
			$dados = array();
            $dados["errors"] =  $errors;
            $dados["serie"] =   viewSerie($id);
			exibir("serie/editar", $dados);
		} else {
			editSerie(
				$id,
				$serie
			);
			redirecionar("serie/");
		}
	} else {
		$dados = array();
		$dados["serie"] = viewSerie($id);
		exibir("serie/editar", $dados);
	}
}
