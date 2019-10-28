<?php

function uploadImagem($imagem_temp_name,$name_imagem)
{
	$extensao = 	strtolower(substr($name_imagem,-4));
	$novo_nome = 	md5(time()).$extensao;
	$diretorio = 	"publico/upload/product/";

	move_uploaded_file($imagem_temp_name ,$diretorio.$novo_nome);

	return $diretorio.$novo_nome;
}

function uploadFile($nome_tmp_arquivo, $nome_arquivo)
{
	$extensao = 	strtolower(substr($nome_arquivo,-4));
	$novo_nome = 	date("Y-m-d_H-i-s").$extensao;
	$diretorio = 	"publico/upload/files/";

	move_uploaded_file($nome_tmp_arquivo, $diretorio.$novo_nome);

	return $diretorio.$novo_nome;
}