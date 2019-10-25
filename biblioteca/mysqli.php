<?php

function conn() {
	$local = 	"biblioteca/manipulacao/local.csv";
	$servidor = "biblioteca/manipulacao/servidor.csv";

	$arquivo = $local;

	$file = fopen($arquivo, 'r');

		$linha = 		fgets($file);

		$conexao = 		explode(',', $linha);

		$server = 		$conexao[0];
		$usuario = 		$conexao[1];
		$senha = 		$conexao[2];
		$database = 	$conexao[3];

	fclose($file);

	$cnx = mysqli_connect($server, $usuario, $senha, $database);

	if (!$cnx) {die('Deu errado a conexao!');}
	return $cnx;
}
