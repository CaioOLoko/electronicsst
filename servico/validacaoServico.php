<?php

# VALIDAÇÃO DO USUÁRIO/ADM

function validar_Nome($nome)
{
	$regex = "/^[A-Za-záàâãéèêîíìóòôõúùûçñÁÀÂÃÉÈÊÍÌÎÓÒÔÕÚÙÛÇÑ]+$/";

	if ((!strlen(trim($nome)) > 0) && (!strlen(trim($nome)) < 60)) {
		return false;
	} else {
		$nome = trim($nome);
		if (preg_match($regex, $nome)) {
			return true;
		} else {
			return false;
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

function validar_Extensao_Imagem($image_name)
{
	$extensao = strtolower(substr($image_name, -4));
	if (
		$extensao == ".jpg" ||
		$extensao == ".png" ||
		$extensao == ".gif"
	){
		return true;
	}else{
		return false;
	}
}
