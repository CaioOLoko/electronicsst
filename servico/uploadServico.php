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
function uploadImagem($imagem_temp_name,$name_imagem){
	$extensao = strtolower(substr($name_imagem,-4));
	$novo_nome = md5(time()).$extensao;
	$diretorio = "publico/upload/image/product";

	move_uploaded_file($imagem_temp_name ,$diretorio.$novo_nome);
	return $diretorio.$novo_nome;
}

function uploadFile(){}

?>