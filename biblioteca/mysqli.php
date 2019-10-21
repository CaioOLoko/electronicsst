<?php

function conn() {
	$local = "biblioteca/manipulacao/local.csv";
	$servidor = "biblioteca/manipulacao/servidor.csv";

	$arquivo = $servidor;

	$file = fopen($arquivo, 'r');

		$linha = fgets($file);

		$conexao = explode(',', $linha);

		$server = $conexao[0];
		$usuario = $conexao[1];
		$senha = $conexao[2];
		$database = $conexao[3];

		$cnx = mysqli_connect($server, $usuario, $senha, $database);

	fclose($file);

	if (!$cnx) {die('Deu errado a conexao!');}
	return $cnx;
}
