<?php

/*
function uploadImagem($arquivo, $caminhoImagem = "publico/upload/imagens/") {
$imagem_tmp = $arquivo["tmp_name"];
$imagem = basename($arquivo["name"]);

move_uploaded_file($imagem_tmp, $caminhoImagem . $imagem);
$diretorio_da_imagem = $caminhoImagem . $imagem;

return $diretorio_da_imagem;
}
*/

function uploadImagem($tmp_name_file,$name_file){
	$extensao = strtolower(substr($name_file,-4));
	$novo_nome = md5(time()).$extensao;
	$diretorio = "publico/upload/";

	move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

	return $diretorio.$novo_nome;
}

// Função para upload de arquivos
function uploadFile(){}

?>