<?php

require_once 'modelo/categoriaModelo.php';
require_once 'modelo/cupomModelo.php';
require_once 'modelo/enderecoModelo.php';
require_once 'modelo/FormaPagamentoModelo.php';
require_once 'modelo/marcaModelo.php';
require_once 'modelo/produtoModelo.php';
require_once 'modelo/usuarioModelo.php';

function validar_Nome($nome)
{
	$regex = "/^[áàâãéèêîíìóòôõúùûçñÁÀÂÃÉÈÊÍÌÎÓÒÔÕÚÙÛÇÑ]+$/";

	if ((!strlen(trim($nome)) > 0) && (!strlen(trim($nome)) < 60)) {
		return false;
	} else {
		$nome = trim($nome);
		if (preg_match($regex, $nome)) {
			return false;
		} else {
			return true;
		}
	}
}

function validar_Email($email)
{
	$email = strip_tags($email);
	if ((!strlen(trim($email)) > 0) && (!strlen(trim($email)) < 40)) {
		return false;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return false;
	} else {
		return true;
	}
}

function validar_CPF($valor)
{
	$valor = strip_tags($valor);

	if (strlen(trim($valor)) == 0) {
		return false;
	} else {
		$valor = str_replace(array('.', '-', '/'), "", $valor);
		$cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

		if (strlen($cpf) != 11) {
			return false;
		} elseif (
			$cpf == '00000000000' ||
			$cpf == '11111111111' ||
			$cpf == '22222222222' ||
			$cpf == '33333333333' ||
			$cpf == '44444444444' ||
			$cpf == '55555555555' ||
			$cpf == '66666666666' ||
			$cpf == '77777777777' ||
			$cpf == '88888888888' ||
			$cpf == '99999999999'
		){
			return false;
		} else {
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return false;
				}
			}
			return true;
		}
	}
}

function validar_Data(
	$dia,
	$mes,
	$ano
)
{
	if (!checkdate($mes, $dia, $ano) || ($ano < 1900) || (mktime(0, 0, 0, $mes, $dia, $ano) > time())) {
		return false;
	} else {
		return true;
	}
}

function validar_Cep($cep)
{
	$cep = trim($cep);
	$avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
	if (!$avaliaCep) {
		return false;
	} else {
		return true;
	}
}

function validar_Imagem($image_name)
{
	$extensao = strtolower(substr($image_name, -4));
	if (
		$extensao == ".jpg" ||
		$extensao == ".png"
	){
		return true;
	}else{
		return false;
	}
}

function validar_Arquivo($arquivo)
{
	$extensao = strtolower(substr($arquivo,-4));

	if (($extensao != ".txt") && ($extensao != ".csv")){
		return false;
	}else{
		return true;
	}
}


# # # # U P L O A D # # # #
function upload_verifica_marca($marca)
{
	$listaMarcas = allMarca();

	$quant_marcas = 0;

	foreach ($listaMarcas as $nomeMarca) {
		if ($nomeMarca['nome'] == $marca) {
			$quant_marcas++;
		}
	}

	if($quant_marcas == 0){
		addMarca($marca);
	}

	return returnIdMarcaByNome($marca);
}

function upload_verifica_categoria($categoria)
{
	$listaCategorias = allCategoria();

	$quant_categorias = 0;

	foreach ($listaCategorias as $nomeCategoria) {
		if ($nomeCategoria['nome'] == $categoria) {
			$quant_categorias++;
		}
	}

	if($quant_categorias == 0){
		addCategoria($categoria);
	}

	return returnIdCategoriaByNome($categoria);
}
