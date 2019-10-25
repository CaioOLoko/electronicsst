<?php

function calcular_frete(
	$cep_destino,
	$valor // valor de serviço adicionais
)
{

	$cep_origem = 18202000;
	$peso = 5; // em quilogramas
	$altura = 20;
	$largura = 20;
	$comprimento = 20;
	$tipo_do_frete = 40010;// Se é PAC ou Sedex

	$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
	$url .= "nCdEmpresa=";
	$url .= "&sDsSenha=";
	$url .= "&sCepOrigem=" . $cep_origem;
	$url .= "&sCepDestino=" . $cep_destino;
	$url .= "&nVlPeso=" . $peso;
	$url .= "&nVlLargura=" . $largura;
	$url .= "&nVlAltura=" . $altura;
	$url .= "&nCdFormato=1";
	$url .= "&nVlComprimento=" . $comprimento;
	$url .= "&sCdMaoProria=n";
	$url .= "&nVlValorDeclarado=" . $valor;
	$url .= "&sCdAvisoRecebimento=n";
	$url .= "&nCdServico=" . $tipo_do_frete;
	$url .= "&nVlDiametro=0";
	$url .= "&StrRetorno=xml";

	//Sedex: 40010
	//Pac: 41106

	$xml = simplexml_load_file($url);

	return $xml->cServico->Valor;
}
